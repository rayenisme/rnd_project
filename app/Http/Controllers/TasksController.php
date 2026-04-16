<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\TaskImage;
use App\Models\TaskImages;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;

class TasksController extends Controller
{
    public function show($id)
{
    Carbon::setLocale('id');
    $task = Tasks::with('logs')->findOrFail($id);
    return view('task_logs', compact('task'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'department_id' => 'required|exists:departments,id',
        'pic_name' => 'required|string|max:255',
        'image' => 'required|array|min:1',
        'image.*' => 'image|mimes:jpg,jpeg,png|max:5120',
                ], [
                    'image.required' => 'Foto wajib diupload minimal 1',
                    'image.min' => 'Minimal upload 1 foto',
                ]);

    DB::beginTransaction();

    try {

        // 🔹 Generate kode
        $month = now()->format('m');
        $year  = now()->format('Y');

        $department = Departments::find($validated['department_id']);

        $count = Tasks::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('department_id', $validated['department_id'])
            ->count() + 1;

        $number = str_pad($count, 3, '0', STR_PAD_LEFT);

        $isUrgent = $request->has('is_urgent');

        $code = $isUrgent
            ? "{$department->code}-UR-{$month}-{$year}-{$number}"
            : "{$department->code}-{$month}-{$year}-{$number}";

        $task = Tasks::create([
            'name' => $validated['name'],
            'department_id' => $validated['department_id'],
            'pic_name' => $validated['pic_name'],
            'description' => $request->description ?? 'Deskripsi belum ditambahkan. Silahkan tambahkan deskripsi untuk event ini.',
            'code' => $code,
            'is_urgent' => $isUrgent,
        ]);

        if ($request->hasFile('image')) {

            foreach ($request->file('image') as $image) {

                $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                $manager = new ImageManager(new Driver());

                $img = $manager->decode($image)->orient();
                $img = $img->scale(width: 1200);

                $encoded = $img->encode(new JpegEncoder(quality: 80));

                $path = "tasks/{$task->id}/initial/" . $filename;

                Storage::disk('s3')->put($path, $encoded, 'public');

                TaskImages::create([
                    'task_id' => $task->id,
                    'image_path' => $path
                ]);
            }
        }

        DB::commit();

        return redirect()->back()->with('success', 'Event Telah berhasil ditambahkan!');

    } catch (\Exception $e) {

        DB::rollBack();

        Log::error('Gagal menambahkan Event', [
            'error'   => $e->getMessage(),
            'request' => $request->all(),
        ]);

        return redirect()->back()->with('error', 'Terjadi error: ' . $e->getMessage());
        }
    }

public function uploadPhoto(Request $request, Tasks $task)
{
    $request->validate([
        'image' => 'required',
        'image.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    foreach ($request->file('image') as $file) {

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $manager = new ImageManager(new Driver());

        
        $img = $manager->decode($file)->orient();
        $img = $img->scale(width: 1200);
        $encoded = $img->encode(new JpegEncoder(quality: 80));
        
        $path = "tasks/{$task->id}/initial/{$filename}";
        Storage::disk('s3')->put($path, $encoded, 'public');

        $task->images()->create([
            'image_path' => $path,
        ]);
    }

    return back()->with('success', 'Foto berhasil ditambahkan');
}
}