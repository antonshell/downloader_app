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

                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->url }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->local_path }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>

        </div>

    </div>
@stop