<?php
namespace Deployer;

require 'recipe/laravel.php';

set('repository', 'git@github.com:Joel-GVaya/ProyectoBackend.git');
set('application', 'proyecto-backend');
add('shared_files', ['.env']);
add('shared_dirs', ['storage', 'bootstrap/cache']);
add('writable_dirs', ['storage', 'bootstrap/cache']);

host('3.224.15.163')
    ->set('remote_user', 'ubuntu')
    ->set('identity_file', '~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/proyecto-backend');

task('deploy:composer_install', function () {
    run('cd {{release_path}} && composer install --no-dev --optimize-autoloader');
});

task('deploy:artisan_clear', function () {
    run('cd {{release_path}} && php artisan config:clear');
    run('cd {{release_path}} && php artisan route:clear');
    run('cd {{release_path}} && php artisan view:clear');
    run('cd {{release_path}} && php artisan cache:clear');
});

task('deploy:update_code', function () {
    run('git clone --branch main {{repository}} {{release_path}}');
});

before('deploy:symlink', 'deploy:composer_install');
after('deploy:update_code', 'deploy:composer_install');
after('deploy:composer_install', 'deploy:artisan_clear');

before('deploy', 'deploy:unlock');

after('deploy:failed', 'deploy:rollback');
after('deploy:failed', 'deploy:unlock');
