<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tasks;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function root()
    {
        return view('auth-login');
    }

    public function index(Request $request)
    {
        return view('index');
    }

    public function event(Request $request)
    {
        Carbon::setLocale('id');
        try {
        $tasks = Tasks::orderBy('created_at', 'desc')->get();

        return view('event', compact('tasks'));
        } catch (\Exception $e) {
            \Log::error('Gagal mengambil data: '.$e->getMessage());
            return redirect()->back()->with('error', 'Terjadi error saat mengambil data');
        }
    }
}
