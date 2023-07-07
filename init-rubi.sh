#!/bin/bash

set -e


/usr/local/bin/php /app/artisan optimize
/usr/local/bin/php /app/artisan migrate --force
