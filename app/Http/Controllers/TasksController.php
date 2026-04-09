<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        'department_id' => 'required|string|max:255',
        'pic_name' => 'required|string|max:255',
    ]);

        $date = now()->format('dmy');
        $department = Departments::find($validated['department_id']);
        $count = Tasks::whereDate('created_at', now())
                ->where('department_id', $validated['department_id'])
                ->count() + 1;
        $prefix = $request->has('is_urgent') ? 'RDUR' : 'RD';
        $code = "$prefix-{$date}-{$department->code}-{$count}";
        
        try {
        $task = Tasks::create([
            'name' => $validated['name'],
            'department_id' => $validated['department_id'],
            'pic_name' => $validated['pic_name'],
            'description' =>  $request->description ?? 'Deskripsi belum ditambahkan. Silahkan tambahkan deskripsi untuk event ini.',
            'code' => $code,
            'is_urgent' => $request->has('is_urgent'),
        ]);

        if(!$task) {
            return redirect()->back()->with('error', 'Gagal menambahkan Task. Periksa konfigurasi model Task.');
        }

        return redirect()->back()->with('success', 'Event Telah berhasil ditambahkan!');

    } catch (\Exception $e) {
        Log::error('Gagal menambahkan Event', [
        'error'   => $e->getMessage(),
        'request' => $request->all(),
    ]);
        return redirect()->back()->with('error', 'Terjadi error: ' . $e->getMessage());
    }
    }
    
}