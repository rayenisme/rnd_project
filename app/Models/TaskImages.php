<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskImages extends Model
{
    protected $fillable = [
        'task_id',
        'image_path',
    ];

    public function task()
    {
        return $this->belongsTo(Tasks::class);
    }
}