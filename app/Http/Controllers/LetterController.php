<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data letter
        $letters = Letter::all();
        return view('admin.letter', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLetter()
    {
        $letters = Letter::all();
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $letters = new Letter;
        $letters->nomor_surat = $request->nomor_surat;
        $letters->department = $request->department;
        $letters->singkatan_nama_kegiatan = $request->singkatan_nama_kegiatan;
        $letters->kode_unik = $request->kode_unik;
        $letters->nama_kegiatan = $request->nama_kegiatan;
        $letters->hari_kegiatan = $request->hari_kegiatan;
        $letters->tanggal_kegiatan = $request->tanggal_kegiatan;
        $letters->jam_mulai = $request->jam_mulai;
        $letters->jam_selesai = $request->jam_selesai;
        $letters->contact_person = $request->contact_person;
        $letters->jumlah_lampiran = $request->jumlah_lampiran;
        $letters->save();
        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letter  $letters
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letter  $letters
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letter  $letters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $letters = Letter::findOrFail($id);
        $letters->update($request->all());
        toast('Berhasil Update Data', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letters
     * @return \Illuminate\Http\Response
     */
    public function destroy($letter_id)
    {
        Letter::destroy($letter_id);
        return back();
    }
}
