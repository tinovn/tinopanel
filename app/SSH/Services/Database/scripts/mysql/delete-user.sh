if ! sudo mysql -e "DROP USER IF EXISTS '__username__'@'__host__'"; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! sudo mysql -e "FLUSH PRIVILEGES"; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

echo "Command executed"
