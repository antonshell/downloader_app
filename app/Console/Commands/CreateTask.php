<?php

namespace App\Console\Commands;

use App\Jobs\DownloadResource;
use App\Repositories\TaskRepository;
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
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * Create a new command instance.
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(
        TaskRepository $taskRepository
    )
    {
        $this->taskRepository = $taskRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = $this->argument('url');
        $task = $this->taskRepository->createFromUrl($url);
        DownloadResource::dispatch($task);

        $id = $task->getKey();
        $this->info("Created task #$id");
    }
}
