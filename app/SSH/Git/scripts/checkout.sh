if ! cd __path__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! git checkout -f __branch__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi
