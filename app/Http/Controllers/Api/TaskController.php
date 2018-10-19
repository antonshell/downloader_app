<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\DownloadResource;
use App\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $data['status'] = Task::STATUS_PENDING;
        $data['local_path'] = '';

        $task = Task::create($data);
        DownloadResource::dispatch($task);

        return $task;
    }

}
