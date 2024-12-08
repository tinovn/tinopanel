if ! echo '__key__' | sudo tee -a ~/.ssh/authorized_keys; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
