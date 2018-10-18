<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data['status'] = Task::STATUS_PENDING;
        $data['local_path'] = '';

        return Task::create($data);
    }

}
