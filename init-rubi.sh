#!/bin/bash

set -e

composer dump-autoload

/usr/local/bin/php /app/artisan optimize

/usr/local/bin/php /app/artisan config:cache
/usr/local/bin/php /app/artisan view:cache
/usr/local/bin/php /app/artisan view:clear

# moment
/usr/local/bin/php /app/artisan migrate:fresh --seed --force

# /usr/local/bin/php /app/artisan migrate:fresh --seed
