if ! sudo mysql -e "DROP DATABASE IF EXISTS __name__"; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

echo "Command executed"
