<?php

namespace App\Http\Controllers;

use App\Task;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main()
    {
        $tasks = Task::all();
        return view('pages.main',[
            'tasks' => $tasks
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enqueue()
    {
        return view('pages.enqueue');
    }
}
