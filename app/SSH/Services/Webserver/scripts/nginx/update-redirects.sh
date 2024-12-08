if ! echo '__redirects__' | sudo tee /etc/nginx/conf.d/__domain___redirects; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! sudo service nginx restart; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
