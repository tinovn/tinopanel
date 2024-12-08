sudo service tino-agent stop

sudo systemctl disable tino-agent

sudo rm -f /usr/local/bin/tino-agent

sudo rm -f /etc/systemd/system/tino-agent.service

sudo rm -rf /etc/tino-agent

sudo systemctl daemon-reload

echo "Tino Agent uninstalled successfully"
