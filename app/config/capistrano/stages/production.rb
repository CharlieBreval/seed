set :stage, :production

set :ssh_user, 'charlieba'
server 'ftp.cluster010.hosting.ovh.net', user: fetch(:ssh_user), roles: %w{web app db}

set :branch, 'master'
set :deploy_to, '/homez.651/charlieba/charliebreval.com'
set :tmp_dir, '/homez.651/charlieba/tmp'
set :composer_path, '/homez.651/charlieba/composer.phar'

SSHKit.config.command_map[:composer] = "/usr/local/php7.1/bin/php #{fetch(:composer_path)}"
SSHKit.config.command_map[:php] = "/usr/local/php7.1/bin/php"

after 'deploy:updated', 'upload:medias'
