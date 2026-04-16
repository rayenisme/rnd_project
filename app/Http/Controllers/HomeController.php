<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

        $tasks = DB::table('tasks as t')
                ->leftJoin('task_logs as tl', 't.id', '=', 'tl.task_id')
                ->leftJoin('departments as d', 't.department_id', '=', 'd.id')
                ->select(
                    't.*',
                    'd.name as department_name',
                    DB::raw("
                        GROUP_CONCAT(
                            CONCAT(
                                DATE_FORMAT(tl.created_at, '%d-%m-%Y'),
                                ' - ',
                                tl.description
                            )
                            ORDER BY tl.created_at ASC
                            SEPARATOR '\n'
                        ) AS timeline
                    ")
                )
                ->groupBy('t.id')
                ->orderBy('t.created_at', 'desc')
                ->get();
        $departments = Departments::orderBy('name')->get();

        return view('event', compact('tasks', 'departments'));
        } catch (\Exception $e) {
            Log::error('Gagal mengambil data: '.$e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi error saat mengambil data');
        }
    }

    public function department()
    {
        Carbon::setLocale('id');
        try {

        $departments = Departments::orderBy('created_at', 'desc')->get();

        return view('department', compact('departments'));
        } catch (\Exception $e) {
            Log::error('Gagal mengambil data: '.$e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi error saat mengambil data');
        }
    }

    public function reportEvent()
{
    Carbon::setLocale('id');

    try {

        DB::statement('SET SESSION group_concat_max_len = 1000000');

        $tasks = DB::table('tasks as t')->leftJoin('task_logs as tl', 't.id', '=', 'tl.task_id')->leftJoin('departments as d', 't.department_id', '=', 'd.id')->select('t.*','d.name as department_name',
                DB::raw("
                    COALESCE(
                        GROUP_CONCAT(
                            CONCAT(
                                DATE_FORMAT(tl.log_date, '%d-%m-%Y'),
                                ' - ',
                                tl.description
                            )
                            ORDER BY tl.log_date ASC
                            SEPARATOR '\n'
                        ),
                        ''
                    ) AS timeline
                ")
            )
            ->groupBy(
                't.id',
                't.code',
                't.name',
                't.department_id',
                't.pic_name',
                't.is_urgent',
                't.status',
                't.created_at',
                'd.name'
            )
            ->orderBy('t.created_at', 'desc')
            ->get();

        $departments = Departments::orderBy('name')->get();

        return view('report_event', compact('tasks', 'departments'));

    } catch (\Exception $e) {
        Log::error('Gagal mengambil data: ' . $e->getMessage());
        dd($e->getMessage());
    }
}
}
