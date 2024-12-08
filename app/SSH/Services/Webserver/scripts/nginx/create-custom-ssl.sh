if ! sudo mkdir -p __path__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! echo "__certificate__" | sudo tee __certificate_path__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

if ! echo "__pk__" | sudo tee __pk_path__; then
    echo 'TINO_SSH_ERROR' && exit 1
fi

echo "Successfully received certificate."
