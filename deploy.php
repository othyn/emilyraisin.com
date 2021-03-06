<?php

// $ dep init -t Laravel
// https://deployer.org

namespace Deployer;

require 'recipe/laravel.php';
require 'vendor/deployer/recipes/recipe/yarn.php';

// Project name
set('application', 'Emily Raisin');

// Project repository
set('repository', 'git@github.com:othyn/emilyraisin.com.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Hosts
host('deploy.othyn.com')
    ->user('deployer')
    ->identityFile('~/.ssh/deployer')
    ->set('deploy_path', '/var/www/emilyraisin.com');

// Tasks
task('yarn:build', 'yarn build');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

// Configure the public upload directory
// https://github.com/deployphp/deployer/blob/master/recipe/laravel.php#L193
// artisan:storage:link is run by the Laravel recipe automatically
before('deploy:symlink', 'deploy:public_disk');

// Run a Yarn install and then build client assets
after('deploy:update_code', 'yarn:install');
after('yarn:install', 'yarn:build');

// TODO
// Create step that grabs current IP then uses doctl to update the allowed FW rules on DO, so that I don't have to manually do it each time
