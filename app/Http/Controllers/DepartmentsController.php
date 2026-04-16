<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function store(Request $request)
{
   $validated = $request->validate([
        'code' => 'required|string|max:10|unique:departments,code',
        'name' => 'required|string|max:100',
    ]);

    DB::beginTransaction();

    try {

        Departments::create([
            'code' => $validated['code'],
            'name' => $validated['name'],
        ]);

        DB::commit();

        return redirect()->back()->with('success', 'Departemen berhasil ditambahkan');

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()->back()->with('error', 'Gagal menambahkan departemen');
    }

}
}