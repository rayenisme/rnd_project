<?php

namespace App\Http\Controllers;

use App\Models\TaskLogs;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskLogsController extends Controller
{


public function store(Request $request)
{
    $request->validate([
        'task_id' => 'required',
        'description' => 'required',
        'note' => 'nullable',
        'image' => 'nullable|image'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('task_logs', 'public');
    }

    TaskLogs::create([
        'task_id' => $request->task_id,
        'log_date' => now(),
        'description' => $request->description,
        'note' => $request->note ?? null,
        'image' => $imagePath
    ]);

    $message = 'Timeline telah diupdate';

    if ($request->is_clear) {

        $task = Tasks::find($request->task_id);

        if ($task->status != 'Clear') {

            $task->update(['status' => 'Clear']);

            TaskLogs::create([
                'task_id' => $request->task_id,
                'log_date' => now(),
                'description' => 'Event telah diselesaikan',
                'note' => $request->note ?? null,
                'image' => null
            ]);

            $message = 'Event telah selesai';
        } else {
            $message = 'Event sudah dalam status selesai';
        }
    }

    return redirect()->back()->with('success', $message);
}

public function updateDescription(Request $request, $id)
{
    $request->validate([
        'description' => 'required|string'
    ]);

    $task = Tasks::findOrFail($id);

    $task->update([
        'description' => $request->description
    ]);

    return redirect()->back()->with('success', 'Deskripsi berhasil diperbarui');
}
}