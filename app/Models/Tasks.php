<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TaskLogs;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'department',
        'pic_name',
        'description',
        'status'
    ];

    public function index()
{
    try {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    } catch (\Exception $e) {
        \Log::error('Gagal mengambil Task: '.$e->getMessage());
        return redirect()->back()->with('error', 'Terjadi error saat mengambil data Task');
    }
}

    public function logs()
    {
        return $this->hasMany(TaskLogs::class, 'task_id');
    }

    protected static function boot()
{
    parent::boot();

    static::created(function ($task) {
            TaskLogs::create([
            'task_id' => $task->id,
            'log_date' => now(),
            'description' => 'Event telah diinisialisasi.',
        ]);
    });
}
}