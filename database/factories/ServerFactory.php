<?php

namespace Database\Factories;

use App\Enums\OperatingSystem;
use App\Enums\ServerProvider;
use App\Enums\ServerStatus;
use App\Enums\ServerType;
use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    protected $model = Server::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'ssh_user' => 'tino',
            'ip' => $this->faker->ipv4(),
            'local_ip' => $this->faker->ipv4(),
            'port' => 22,
            'os' => OperatingSystem::UBUNTU22,
            'type' => ServerType::REGULAR,
            'provider' => ServerProvider::CUSTOM,
            'authentication' => [
                'user' => 'tino',
                'pass' => 'password',
            ],
            'public_key' => 'test',
            'status' => ServerStatus::READY,
            'progress' => 100,
        ];
    }
}
