if ! sudo supervisorctl start __id__:*; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
