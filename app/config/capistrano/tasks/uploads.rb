set :rails_env, 'production'

namespace :upload do
    task :medias do
      run_locally do
          roles(:web).each do |host|
              execute "rsync -avz web/img/* #{host.user}@#{host.hostname}:#{shared_path}/web/img"
              execute "rsync -avz web/videos/* #{host.user}@#{host.hostname}:#{shared_path}/web/videos"
          end
      end
    end
end
