<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        Carbon::setLocale('id');

        $year = date('Y');
        $months = [];
        $urgent = [];
        $standard = [];
            for ($i = 1; $i <= 12; $i++) {
                 $date = Carbon::createFromDate($year, $i, 1);
                  $months[] = $date->isoFormat('MMM YYYY');

                 $tasks = Tasks::whereYear('created_at', $year)
                     ->whereMonth('created_at', $i)
                     ->get();

                     $urgent[] = $tasks->where('is_urgent', 1)->count();
                     $standard[] = $tasks->where('is_urgent', 0)->count();
            }
        $series = [
            ['name' => 'Standard', 'data' => $standard],
            ['name' => 'Urgent', 'data' => $urgent],
        ];

        $departments = Departments::all();
        $inProgressCount = Tasks::where('status', 'In Progress')->count();
        $clearCount = Tasks::where('status', 'Clear')->count();
        $urgentCount = Tasks::where('is_urgent', 1)->count();
        return view('index', compact('inProgressCount', 'clearCount', 'urgentCount', 'departments', 'series', 'months'));
    }

    public function event(Request $request)
    {
        Carbon::setLocale('id');
        try {

        $tasks = Tasks::orderBy('created_at', 'desc')->get();
        $departments = Departments::orderBy('name')->get();

        return view('event', compact('tasks', 'departments'));
        } catch (\Exception $e) {
            Log::error('Gagal mengambil data: '.$e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi error saat mengambil data');
        }
    }

    public function department(){
        return view('pages-comingsoon');
    }
}
