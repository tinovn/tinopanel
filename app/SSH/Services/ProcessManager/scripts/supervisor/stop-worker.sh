if ! sudo supervisorctl stop __id__:*; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
