<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\TaskLogs;
use Illuminate\Support\Str;
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
        'department' => 'required|string|max:255',
        'pic_name' => 'required|string|max:255',
    ]);

        $date = now()->format('Ymd');
        $random = Str::upper(Str::random(4));
        $code = "TASK-{$date}-{$random}";
        
        try {
        $task = Tasks::create([
            'name' => $validated['name'],
            'department' => $validated['department'],
            'pic_name' => $validated['pic_name'],
            'description' =>  $request->description ?? 'Deskripsi belum ditambahkan. Silahkan tambahkan deskripsi untuk event ini.',
            'code' => $code,    
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
