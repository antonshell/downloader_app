<?php

namespace Tests\Unit\Repositories;

use App\Repositories\TaskRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TasksTableSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $repository = new TaskRepository();
        $url = 'http://demo.antonshell.me/files/sardegna.gpx?time=' . time();
        $model = $repository->createFromUrl($url);
        $this->assertEquals(TasksTableSeeder::NEW_ID, $model->id);
        $this->assertEquals($url, $model->url);
    }
}
