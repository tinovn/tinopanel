if ! wget __url__ -O __path__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
