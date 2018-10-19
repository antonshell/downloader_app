<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

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
            Task::create($data);
            return redirect('/');
        }

        $tasks = Task::all();
        return view('pages.main',[
            'tasks' => $tasks
        ]);
    }
}
