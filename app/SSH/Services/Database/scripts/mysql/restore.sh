if ! DEBIAN_FRONTEND=noninteractive unzip __file__.zip; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! sudo DEBIAN_FRONTEND=noninteractive mysql -u root __database__ < __file__.sql; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! rm __file__.sql __file__.zip; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
