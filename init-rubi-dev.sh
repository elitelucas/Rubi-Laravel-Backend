#!/bin/bash

set -e

composer dump-autoload

#/usr/local/bin/php /app/artisan config:cache
#/usr/local/bin/php /app/artisan view:cache
#/usr/local/bin/php /app/artisan view:clear
#/usr/local/bin/php /app/artisan route:clear

/usr/local/bin/php /app/artisan optimize:clear

# moment
# /usr/local/bin/php /app/artisan telescope:install
/usr/local/bin/php /app/artisan migrate:fresh --seed --force

/usr/local/bin/php /app/artisan passport:install --uuids


# /usr/local/bin/php /app/artisan migrate:fresh --seed
