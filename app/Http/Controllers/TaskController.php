<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadResource;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * TaskController constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(
        TaskRepository $taskRepository
    )
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main(Request $request)
    {
        if($request->method() == "POST"){
            $url = $request->get('url');
            $task = $this->taskRepository->createFromUrl($url);
            DownloadResource::dispatch($task);
            return redirect('/');
        }

        $tasks = Task::all();
        return view('pages.main',[
            'tasks' => $tasks
        ]);
    }
}
