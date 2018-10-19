@extends('layouts.default')
@section('content')
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

                <!-- Title -->
                <h1 class="mt-4">Tasks</h1>

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Url</th>
                        <th>Status</th>
                        <th>Local path</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>

                    @if(count($tasks) == 0)
                        <tr>
                            <td colspan="6">No tasks available</td>
                        </tr>
                    @endif

                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->url }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                @if($task->local_path)
                                    <a href="{{ $task->local_path }}">Download</a>
                                @endif
                            </td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>

                <div class="card my-4">
                    <h5 class="card-header">Enqueue task:</h5>
                    <div class="card-body">
                        <form method="post" action="">

                            @csrf

                            <div class="form-group">
                                <input type="text" name="url" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
@stop