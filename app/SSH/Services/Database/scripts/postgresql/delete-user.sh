if ! sudo -u postgres psql -c "DROP USER \"__username__\""; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

echo "User __username__ deleted"
