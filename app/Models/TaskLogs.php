<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskLogs;

class TaskLogs extends Model
{
    protected $fillable = [
        'task_id',
        'log_date',
        'description',
        'note',
        'image'
    ];

    public function task()
    {
        return $this->belongsTo(Tasks::class);
    }
}
