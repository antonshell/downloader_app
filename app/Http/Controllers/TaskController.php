<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadResource;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main(Request $request)
    {
        if($request->method() == "POST"){
            $data = $request->all();
            $data['status'] = Task::STATUS_PENDING;
            $data['local_path'] = '';
            $task = Task::create($data);

            DownloadResource::dispatch($task);

            return redirect('/');
        }

        $tasks = Task::all();
        return view('pages.main',[
            'tasks' => $tasks
        ]);
    }
}
