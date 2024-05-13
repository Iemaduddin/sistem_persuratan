<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.department-management', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departments = new Department();
        $departments->name = $request->name;
        $departments->save();
        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $depart_id)
    {
        $departments = Department::where('id', $depart_id);
        $departments->update(['name' => $request->name]);
        toast('Berhasil Update Data', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($depart_id)
    {
        Department::destroy($depart_id);
        return back();
    }
}
