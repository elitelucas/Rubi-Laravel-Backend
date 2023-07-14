#!/bin/bash

set -e




if [ ${RUN_PRESTART:-False} ne 'False' ];
then

    /usr/local/bin/php /app/artisan migrate --force

    composer dump-autoload

    /usr/local/bin/php /app/artisan optimize

    /usr/local/bin/php /app/artisan config:cache
    /usr/local/bin/php /app/artisan view:cache
    /usr/local/bin/php /app/artisan view:clear

fi


if [ ${MIGRATE_SEED:-False} ne 'False'];
then
    /usr/local/bin/php /app/artisan migrate:fresh --seed --force
fi
