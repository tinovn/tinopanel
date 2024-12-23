<?php

namespace App\SSH\Cron;

use App\Models\Server;

class Cron
{
    public function __construct(protected Server $server) {}

    public function update(string $user, string $cron): void
    {
        $command = <<<EOD
            if ! echo '$cron' | sudo -u $user crontab -; then
                echo 'TINO_SSH_ERROR' && exit 1
            fi

            if ! sudo -u $user crontab -l; then
                echo 'TINO_SSH_ERROR' && exit 1
            fi

            echo 'cron updated!'
        EOD;

        $this->server->ssh()->exec($command, 'update-cron');
    }
}
