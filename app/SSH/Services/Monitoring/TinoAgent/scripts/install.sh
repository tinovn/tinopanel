arch=$(uname -m)

if [ "$arch" == "x86_64" ]; then
    executable="tinoagent-linux-amd64"
elif [ "$arch" == "i686" ]; then
    executable="tinoagent-linux-amd"
elif [ "$arch" == "armv7l" ]; then
    executable="tinoagent-linux-arm"
elif [ "$arch" == "aarch64" ]; then
    executable="tinoagent-linux-arm64"
else
    executable="tinoagent-linux-amd64"
fi

wget __download_url__/$executable

chmod +x ./$executable

sudo mv ./$executable /usr/local/bin/tino-agent

# create service
export VITO_AGENT_SERVICE="
[Unit]
Description=Tino Agent
After=network.target

[Service]
Type=simple
User=root
ExecStart=/usr/local/bin/tino-agent
Restart=on-failure

[Install]
WantedBy=multi-user.target
"
echo "${VITO_AGENT_SERVICE}" | sudo tee /etc/systemd/system/tino-agent.service

sudo mkdir -p /etc/tino-agent

export VITO_AGENT_CONFIG="
{
    \"url\": \"__config_url__\",
    \"secret\": \"__config_secret__\"
}
"

echo "${VITO_AGENT_CONFIG}" | sudo tee /etc/tino-agent/config.json

sudo systemctl daemon-reload
sudo systemctl enable tino-agent
sudo systemctl start tino-agent

echo "Tino Agent installed successfully"
