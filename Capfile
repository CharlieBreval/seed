set :deploy_config_path, "app/config/capistrano/deploy.rb"
set :stage_config_path, "app/config/capistrano/stages/"
set :upload_files_path, "app/config/capistrano/files/"

# Load DSL and set up stages
require "capistrano/setup"
# Include default deployment tasks
require "capistrano/deploy"
require 'capistrano/symfony'
require 'capistrano/file-permissions'

require "capistrano/scm/git"
install_plugin Capistrano::SCM::Git


# Load custom tasks from `lib/capistrano/tasks` if you have any defined
Dir.glob("app/config/capistrano/tasks/*.rb").each { |r| import r }
