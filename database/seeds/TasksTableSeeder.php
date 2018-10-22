<?php

use App\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    private $table = 'tasks';

    /**
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->delete();

        DB::table($this->table)->insert([
            'id' => 1,
            'url' => 'http://velocrunch.ru/gpx/sardegna-2017/full.gpx?seed=1',
            'local_path' => '',
            'status' => Task::STATUS_PENDING,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table($this->table)->insert([
            'id' => 2,
            'url' => 'http://velocrunch.ru/gpx/sardegna-2017/full.gpx?seed=2',
            'local_path' => '',
            'status' => Task::STATUS_PENDING,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table($this->table)->insert([
            'id' => 3,
            'url' => 'http://velocrunch.ru/gpx/sardegna-2017/full.gpx?seed=3',
            'local_path' => '',
            'status' => Task::STATUS_PENDING,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
