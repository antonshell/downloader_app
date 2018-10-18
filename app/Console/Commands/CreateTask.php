<?php

namespace App\Console\Commands;

use App\Task;
use Illuminate\Console\Command;

class CreateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:create {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = $this->argument('url');
        $data = [
            'url' => $url,
            'status' => Task::STATUS_PENDING,
            'local_path' => '',
        ];

        $task = Task::create($data);
        $id = $task->getKey();

        $this->info("Created task #$id");
    }
}
