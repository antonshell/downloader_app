<?php

namespace App\Console\Commands;

use App\Task;
use Illuminate\Console\Command;

class ListTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all tasks';

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
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::all();

        if(count($tasks) == 0){
            $this->info("No tasks available");
        }

        foreach ($tasks as $task){
            $id = $task->getKey();
            $status = $task->status;
            $url = $task->url;
            $this->info("Task #$id - $status - $url");
        }
    }
}
