<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\TaskLogs;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Intervention\Image\Encoders\JpegEncoder;

class TaskLogsController extends Controller
{


public function store(Request $request)
{
    $validated = $request->validate([
        'task_id'     => 'required|exists:tasks,id',
        'description' => 'required|string|min:10',
        'note'        => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
    ]);

    DB::beginTransaction();

    try {
        $imagePath = null;

        // ✅ HANDLE IMAGE
        if ($request->hasFile('image')) {

            $image    = $request->file('image');
            $filename = uniqid() . '.jpg';

            $manager = new ImageManager(new Driver());

            $img = $manager->decode($image)->orient();

            $img->scale(width: 1200);

            $encoded = $img->encode(new JpegEncoder(quality: 80));

            Storage::disk('public')->put('task_logs/' . $filename, $encoded);

            $imagePath = 'task_logs/' . $filename;
        }

        $description = $validated['description'];
        $message = 'Timeline telah diupdate';

        if ($request->has('is_clear')) {

            $task = Tasks::findOrFail($validated['task_id']);

            if ($task->status !== 'Clear') {
                $task->update(['status' => 'Clear']);

                $description .= ' (Clear)';

                $message = 'Event telah selesai';
            } else {
                $message = 'Event sudah dalam status selesai';
            }
        }

        TaskLogs::create([
            'task_id'     => $validated['task_id'],
            'log_date'    => now(),
            'description' => $description,
            'note'        => $validated['note'] ?? null,
            'image'       => $imagePath,
        ]);

        DB::commit();

        return redirect()->back()->with('success', $message);

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
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