<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use TasksTableSeeder;
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
            ->expectsOutput('Created task #' . TasksTableSeeder::NEW_ID)
            ->assertExitCode(0);
    }

    /**
     * @return void
     */
    public function testGetTasks()
    {
        $test = $this->artisan('task:list');

        for ($i = 1; $i <= TasksTableSeeder::TOTAL_COUNT; $i++){
            $test->expectsOutput("Task #$i - pending - http://velocrunch.ru/gpx/sardegna-2017/full.gpx?seed=$i");
        }

        $test->assertExitCode(0);
    }
}
