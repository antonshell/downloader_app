<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ConsoleTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /**
     * @return void
     */
    public function testCreateTask()
    {
        $url = 'http://velocrunch.ru/gpx/sardegna-2017/full.gpx?time=' . time();
        $this->artisan('task:create', ['url' => $url])
            ->expectsOutput('Created task #4')
            ->assertExitCode(0);
    }

    /**
     * @return void
     */
    public function testGetTasks()
    {
        $this->artisan('task:list')
            ->expectsOutput('Task #1 - pending - http://velocrunch.ru/gpx/sardegna-2017/full.gpx?seed=1')
            ->expectsOutput('Task #2 - pending - http://velocrunch.ru/gpx/sardegna-2017/full.gpx?seed=2')
            ->expectsOutput('Task #3 - pending - http://velocrunch.ru/gpx/sardegna-2017/full.gpx?seed=3')
            ->assertExitCode(0);
    }
}
