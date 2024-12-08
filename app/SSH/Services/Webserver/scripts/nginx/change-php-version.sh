if ! sudo sed -i 's/php__old_version__/php__new_version__/g' /etc/nginx/sites-available/__domain__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! sudo service nginx restart; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

echo "PHP Version Changed to __new_version__"
