#!/bin/bash

set -e


/usr/local/bin/php /app/artisan migrate --force

composer dump-autoload

/usr/local/bin/php /app/artisan optimize

/usr/local/bin/php /app/artisan config:cache
/usr/local/bin/php /app/artisan view:cache
/usr/local/bin/php /app/artisan view:clear


