bash -c 'ssh_key_to_delete="$1"; sed -i "\#${ssh_key_to_delete//\//\\/}#d" /home/tino/.ssh/authorized_keys' bash '__key__'
