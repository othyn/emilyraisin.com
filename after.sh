#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

cd code

echo 'Migrating database schema...'
php artisan migrate:refresh

echo 'Seeding DB...'
php artisan db:seed
# Migrate the databases - deleting all content and mapping the migrations a new

echo 'Link public directory for file uploads...'
php artisan storage:link
