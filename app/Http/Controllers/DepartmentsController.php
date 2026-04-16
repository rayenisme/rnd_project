<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate();

    DB::beginTransaction();

}
}