if ! DEBIAN_FRONTEND=noninteractive unzip __file__.zip; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! sudo -u postgres psql -d __database__ -f __file__.sql; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! rm __file__.sql __file__.zip; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
