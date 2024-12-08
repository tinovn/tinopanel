<?php

namespace Tests\Feature;

use App\Enums\CronjobStatus;
use App\Facades\SSH;
use App\Models\CronJob;
use App\Web\Pages\Servers\CronJobs\Index;
use App\Web\Pages\Servers\CronJobs\Widgets\CronJobsList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CronjobTest extends TestCase
{
    use RefreshDatabase;

    public function test_see_cronjobs_list()
    {
        $this->actingAs($this->user);

        /** @var CronJob $cronjob */
        $cronjob = CronJob::factory()->create([
            'server_id' => $this->server->id,
        ]);

        $this->get(Index::getUrl(['server' => $this->server]))
            ->assertSuccessful()
            ->assertSeeText($cronjob->frequencyLabel());
    }

    public function test_delete_cronjob()
    {
        SSH::fake();

        $this->actingAs($this->user);

        /** @var CronJob $cronjob */
        $cronjob = CronJob::factory()->create([
            'server_id' => $this->server->id,
            'user' => 'tino',
        ]);

        Livewire::test(CronJobsList::class, [
            'server' => $this->server,
        ])
            ->callTableAction('delete', $cronjob->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('cron_jobs', [
            'id' => $cronjob->id,
        ]);

        SSH::assertExecutedContains("echo '' | sudo -u tino crontab -");
        SSH::assertExecutedContains('sudo -u tino crontab -l');
    }

    public function test_create_cronjob()
    {
        SSH::fake();

        $this->actingAs($this->user);

        Livewire::test(Index::class, [
            'server' => $this->server,
        ])
            ->callAction('create', [
                'command' => 'ls -la',
                'user' => 'tino',
                'frequency' => '* * * * *',
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('cron_jobs', [
            'server_id' => $this->server->id,
            'command' => 'ls -la',
            'user' => 'tino',
            'frequency' => '* * * * *',
            'status' => CronjobStatus::READY,
        ]);

        SSH::assertExecutedContains("echo '* * * * * ls -la' | sudo -u tino crontab -");
        SSH::assertExecutedContains('sudo -u tino crontab -l');
    }

    public function test_create_custom_cronjob()
    {
        SSH::fake();

        $this->actingAs($this->user);

        Livewire::test(Index::class, [
            'server' => $this->server,
        ])
            ->callAction('create', [
                'command' => 'ls -la',
                'user' => 'tino',
                'frequency' => 'custom',
                'custom' => '* * * 1 1',
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('cron_jobs', [
            'server_id' => $this->server->id,
            'command' => 'ls -la',
            'user' => 'tino',
            'frequency' => '* * * 1 1',
            'status' => CronjobStatus::READY,
        ]);

        SSH::assertExecutedContains("echo '* * * 1 1 ls -la' | sudo -u tino crontab -");
        SSH::assertExecutedContains('sudo -u tino crontab -l');
    }

    public function test_enable_cronjob()
    {
        SSH::fake();

        $this->actingAs($this->user);

        /** @var CronJob $cronjob */
        $cronjob = CronJob::factory()->create([
            'server_id' => $this->server->id,
            'user' => 'tino',
            'command' => 'ls -la',
            'frequency' => '* * * 1 1',
            'status' => CronjobStatus::DISABLED,
        ]);

        Livewire::test(CronJobsList::class, [
            'server' => $this->server,
        ])
            ->assertTableActionHidden('disable', $cronjob->id)
            ->callTableAction('enable', $cronjob->id)
            ->assertSuccessful();

        $cronjob->refresh();

        $this->assertEquals(CronjobStatus::READY, $cronjob->status);

        SSH::assertExecutedContains("echo '* * * 1 1 ls -la' | sudo -u tino crontab -");
        SSH::assertExecutedContains('sudo -u tino crontab -l');
    }

    public function test_disable_cronjob()
    {
        SSH::fake();

        $this->actingAs($this->user);

        /** @var CronJob $cronjob */
        $cronjob = CronJob::factory()->create([
            'server_id' => $this->server->id,
            'user' => 'tino',
            'command' => 'ls -la',
            'frequency' => '* * * 1 1',
            'status' => CronjobStatus::READY,
        ]);

        Livewire::test(CronJobsList::class, [
            'server' => $this->server,
        ])
            ->assertTableActionHidden('enable', $cronjob->id)
            ->callTableAction('disable', $cronjob->id)
            ->assertSuccessful();

        $cronjob->refresh();

        $this->assertEquals(CronjobStatus::DISABLED, $cronjob->status);

        SSH::assertExecutedContains("echo '' | sudo -u tino crontab -");
        SSH::assertExecutedContains('sudo -u tino crontab -l');
    }
}
