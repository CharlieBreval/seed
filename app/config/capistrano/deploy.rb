lock "3.7.2"

set :application, "seed"
set :repo_url, "https://github.com/CharlieBreval/seed.git"
set :git
set :format, :pretty
set :log_level, :info
# set :log_level, :debug

set :composer_install_flags, '--no-dev --prefer-dist --no-interaction --optimize-autoloader'

# Symfony console commands will use this environment for execution
set :symfony_env,  "prod"

# Set this to 2 for the old directory structure
set :symfony_directory_structure, 3
# Set this to 4 if using the older SensioDistributionBundle
set :sensio_distribution_version, 5

# symfony-standard edition directories
set :app_path, "app"
set :web_path, "web"
set :var_path, "var"
set :bin_path, "bin"

# The next 3 settings are lazily evaluated from the above values, so take care
# when modifying them
set :app_config_path, "app/config"
set :log_path, "var/logs"
set :cache_path, "var/cache"

set :symfony_console_path, "bin/console"
set :symfony_console_flags, "--no-debug"

# Remove app_dev.php during deployment, other files in web/ can be specified here
set :controllers_to_clear, ["app_*.php"]

# asset management
set :assets_install_path, "web"
set :assets_install_flags,  '--symlink'

# Share files/directories between releases
set :linked_files, ["app/config/parameters.yml"]
set :linked_dirs, ["var/logs","web/img","web/videos"]

# Set correct permissions between releases, this is turned off by default
set :file_permissions_paths, ["var"]
set :permission_method, false

#before 'deploy:updated', 'build:bootstrap'
after 'deploy:updated', 'symfony:assets:install'
after 'deploy:finishing', 'deploy:cleanup'

