if ! cd __path__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! php__php_version__ /usr/local/bin/composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
