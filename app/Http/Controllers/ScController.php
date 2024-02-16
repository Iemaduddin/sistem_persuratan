<?php

namespace App\Http\Controllers;

use App\Models\Sc;
use Carbon\Carbon;
use App\Models\User;
use App\Exports\ScsExport;
use App\Imports\ScsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ScController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSekum()
    {
        // Ambil data sc
        $sc = Sc::where('username', auth()->user()->username)->first();
        return view('sekum.user-profile', compact('sc'));
    }
    public function showScKestari()
    {
        // Ambil data sc
        $sc = Sc::where('username', auth()->user()->username)->first();
        return view('sc_kestari.user-profile', compact('sc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sc = new Sc;
        $validator = Validator::make($request->all(), [
            'nama' => $request->nama,
            'nif' => $request->nif,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jk' => $request->jk,
            'prodi' => $request->prodi,
            'department' => $request->department,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $email = Sc::where('email', $request->email)->first();
        $username = User::where('username', $request->username)->first();
        if ($username || $email) {
            if ($validator->fails()) {
                return back()->with('error', 'Email atau Username sudah Ada');
            }
        }
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalName();

            // Folder yang sesuai dengan nama sc
            $folderName = strtolower(str_replace(' ', '_', $request->nama));
            $file->storeAs("SC/foto/{$folderName}", $fileName, 'public');
            // Simpan nama file foto ke dalam database
            $sc->create(['foto' => $folderName . '/' . $fileName]);
        }

        $sc->nama = $request->nama;
        $sc->nif = $request->nif;
        $sc->tempat_lahir = $request->tempat_lahir;
        $sc->tanggal_lahir = $request->tanggal_lahir;
        $sc->jk = $request->jk;
        $sc->prodi = $request->prodi;
        $sc->department = $request->department;
        $sc->no_hp = $request->no_hp;
        $sc->role = $request->role;
        $sc->email = $request->email;
        $sc->username = $request->username;
        $sc->password = Hash::make($request->password);
        $sc->save();

        $user = new User;
        $user->sc_id = $sc->id;
        $user->email = $sc->email;
        $user->username = $sc->username;
        $user->password = $request->password; //penting
        if ($request->role == 'Sekum') {
            $user->role_id = 2;
        } elseif ($request->role == 'SC Kestari') {
            $user->role_id = 3;
        }
        $user->save();

        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sc  $sc
     * @return \Illuminate\Http\Response
     */
    public function show(Sc $sc)
    {
        $sc = Sc::all();
        return view('admin.modal.detail_sc', compact('sc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sc  $sc
     * @return \Illuminate\Http\Response
     */
    public function edit(Sc $sc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sc  $sc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sc_id)
    {
        $sc =  Sc::where('id', $sc_id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nif' => 'required|unique:scs',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
            'department' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        $email = Sc::where('email', $request->email)->where('id', '!=', $sc_id)->first();
        $username = Sc::where('username', $request->username)->where('id', '!=', $sc_id)->first();
        if ($username || $email) {
            if ($validator->fails()) {

                return back()->with('error', 'Email atau Username sudah Ada');
            }
        }
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('foto');
            // Ambil nama SC atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $scName = Sc::where('id', $sc_id)->pluck('nama')->first();

            $fileName = time() . '.' . $scName . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'SC/foto/' . $scName;

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $sc->update(['foto' => $folderPath . '/' . $fileName]);
        }
        if ($request->password != null) {
            $sc->update([
                'nama' => $request->nama,
                'nif' => $request->nif,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jk' => $request->jk,
                'prodi' => $request->prodi,
                'department' => $request->department,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            $users = User::where('sc_id', $sc_id)->first();
            $users->update([
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password
            ]);
        } else {
            $sc->update([
                'nama' => $request->nama,
                'nif' => $request->nif,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jk' => $request->jk,
                'prodi' => $request->prodi,
                'department' => $request->department,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'email' => $request->email,
                'username' => $request->username,
            ]);

            $users = User::where('sc_id', $sc_id)->first();
            $users->update([
                'email' => $request->email,
                'username' => $request->username,
            ]);
        }

        toast('Berhasil Update Data', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sc  $sc
     * @return \Illuminate\Http\Response
     */
    public function destroy($sc_id)
    {
        Sc::destroy($sc_id);
        return back();
    }

    public function export_excel()
    {
        return (new ScsExport)->download('data-sc-' . Carbon::now()->timestamp . '.xlsx');
    }

    public function import_excel(Request $request)
    {
        Excel::import(new ScsImport, $request->file('fileSc'));

        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }
    public function downloadTemplate()
    {
        $filePath = 'template-import-data/template-data-sc.xlsx';
        $filename = 'template-data-sc.xlsx';

        return response()->file(storage_path("app/public/{$filePath}"), [
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }
}
