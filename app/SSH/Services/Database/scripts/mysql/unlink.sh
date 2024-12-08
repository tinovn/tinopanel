if ! sudo mysql -e "REVOKE ALL PRIVILEGES, GRANT OPTION FROM '__username__'@'__host__'"; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

echo "Command executed"
