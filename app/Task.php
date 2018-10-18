<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_PENDING = 'pending';

    const STATUS_DOWNLOADING = 'downloading';

    const STATUS_COMPLETE = 'complete';

    const STATUS_ERROR = 'error';

    //pending/downloading/complete/error


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'url',
        'local_path',
        'status',
        'created_at',
        'updated_at',
    ];
}
