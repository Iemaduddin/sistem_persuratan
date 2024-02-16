<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stakeholder;
use Illuminate\Http\Request;
use App\Exports\StakeholdersExport;
use App\Imports\StakeholdersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class StakeholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data stakeholder
        $stakeholders = Stakeholder::all();
        return view('admin.stakeholder', compact('stakeholders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $stakeholders = new Stakeholder;
        $stakeholders->nip = $request->nip;
        $stakeholders->nim = $request->nim;
        $stakeholders->nama = $request->nama;
        $stakeholders->jabatan = $request->jabatan;
        $stakeholders->save();
        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function show(Stakeholder $stakeholder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Stakeholder $stakeholder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stakeholders = Stakeholder::findOrFail($id);
        $stakeholders->update($request->all());
        toast('Berhasil Update Data', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function destroy($stakeholder_id)
    {
        Stakeholder::destroy($stakeholder_id);
        return back();
    }

    public function export_excel()
    {
        return (new StakeholdersExport)->download('data-stakeholder-' . Carbon::now()->timestamp . '.xlsx');
    }

    public function import_excel(Request $request)
    {
        Excel::import(new StakeholdersImport, $request->file('file'));

        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }
}
