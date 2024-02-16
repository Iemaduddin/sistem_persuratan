<?php

namespace App\Http\Controllers;

use App\Models\Oc;
use Carbon\Carbon;
use App\Models\User;
use App\Exports\OcsExport;
use App\Imports\OcsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data oc
        $oc = Oc::where('username', auth()->user()->username)->first();
        return view('oc.user-profile', compact('oc'));
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
        $oc = new Oc;
        $validator = Validator::make($request->all(), [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jk' => $request->jk,
            'prodi' => $request->prodi,
            'department' => $request->department,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status_keaktifan' => $request->status_keaktifan,
        ]);

        $email = Oc::where('email', $request->email)->first();
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
            $oc->create(['foto' => $folderName . '/' . $fileName]);
        }

        $oc->nama = $request->nama;
        $oc->nim = $request->nim;
        $oc->tempat_lahir = $request->tempat_lahir;
        $oc->tanggal_lahir = $request->tanggal_lahir;
        $oc->jk = $request->jk;
        $oc->prodi = $request->prodi;
        $oc->department = $request->department;
        $oc->no_hp = $request->no_hp;
        $oc->email = $request->email;
        $oc->username = $request->username;
        $oc->password = Hash::make($request->password);
        $oc->status_keaktifan = $request->status_keaktifan;
        $oc->save();

        $user = new User;
        $user->oc_id = $oc->id;
        $user->email = $oc->email;
        $user->username = $oc->username;
        $user->password = $request->password; //penting
        $user->save();

        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oc  $oc
     * @return \Illuminate\Http\Response
     */
    public function show(Oc $oc)
    {
        $sc = Oc::all();
        return view('admin.modal.detail_sc', compact('sc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oc  $oc
     * @return \Illuminate\Http\Response
     */
    public function edit(Oc $oc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oc  $oc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $oc_id)
    {
        $oc =  Oc::where('id', $oc_id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required|unique:scs',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
            'department' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'status_keaktifan' => 'required',
        ]);

        $email = Oc::where('email', $request->email)->where('id', '!=', $oc_id)->first();
        $username = Oc::where('username', $request->username)->where('id', '!=', $oc_id)->first();
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
            $ocName = Oc::where('id', $oc_id)->pluck('nama')->first();

            $fileName = time() . '.' . $ocName . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'OC/foto/' . $ocName;

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $oc->update(['foto' => $folderPath . '/' . $fileName]);
        }
        if ($request->password != null) {
            $oc->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jk' => $request->jk,
                'prodi' => $request->prodi,
                'department' => $request->department,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'status_keaktifan' => $request->status_keaktifan,
            ]);

            $users = User::where('oc_id', $oc_id)->first();
            $users->update([
                'email' => $request->email,
                'usename' => $request->username,
                'password' => $request->password
            ]);
        } else {
            $oc->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jk' => $request->jk,
                'prodi' => $request->prodi,
                'department' => $request->department,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'username' => $request->username,
                'status_keaktifan' => $request->status_keaktifan,
            ]);

            $users = User::where('oc_id', $oc_id)->first();
            $users->update([
                'email' => $request->email,
                'usename' => $request->username,
            ]);
        }
        toast('Berhasil Update Data', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oc  $oc
     * @return \Illuminate\Http\Response
     */
    public function destroy($oc_id)
    {
        Oc::destroy($oc_id);
        return back();
    }

    public function export_excel()
    {
        return (new OcsExport)->download('data-oc-' . Carbon::now()->timestamp . '.xlsx');
    }
    public function import_excel(Request $request)
    {
        Excel::import(new OcsImport, $request->file('fileOc'));

        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    public function downloadTemplate()
    {
        $filePath = 'template-import-data/template-data-oc.xlsx';
        $filename = 'template-data-oc.xlsx';

        return response()->file(storage_path("app/public/{$filePath}"), [
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }
}
