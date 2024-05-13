<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('role_id')->get();
        $departments = Department::all();
        return view('admin.user-management', compact('users', 'departments'));
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
        $users = new User;

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalName();

            // Folder yang sesuai dengan nama sc
            $folderName = strtolower(str_replace(' ', '_', $request->nama));
            if ($request->role_id == 2) {
                $file->storeAs("Sekum/foto/{$folderName}", $fileName, 'public');
                $users->create(['foto' => 'Sekum/foto/' . $folderName . $fileName]);
            } elseif ($request->role_id == 3) {
                $file->storeAs("OC/foto/{$folderName}", $fileName, 'public');
                $users->create(['foto' => 'OC/foto/' . $folderName . $fileName]);
            }
            // Simpan nama file foto ke dalam database
        }

        $users->nama = $request->nama;
        $users->nif = $request->nif;
        $users->nim = $request->nim;
        $users->tempat_lahir = $request->tempat_lahir;
        $users->tanggal_lahir = $request->tanggal_lahir;
        $users->jk = $request->jk;
        $users->prodi = $request->prodi;
        $users->department = $request->department;
        $users->no_hp = $request->no_hp;
        $users->role_id = $request->role_id;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->status_keaktifan = $request->status_keaktifan;
        $users->password = Hash::make($request->password);
        $users->save();
        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $users =  User::where('id', $user_id);

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

        $email = User::where('email', $request->email)->where('id', '!=', $user_id)->first();
        $username = User::where('username', $request->username)->where('id', '!=', $user_id)->first();
        if ($username || $email) {
            if ($validator->fails()) {

                return back()->with('error', 'Email atau Username sudah Ada');
            }
        }
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            // Ambil data pengguna
            $user = User::find($user_id);

            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $file = $request->file('foto');
            // Ambil nama SC atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $userName = User::where('id', $user_id)->pluck('nama')->first();

            $fileName = time() . '.' . $userName . $file->getClientOriginalName();
            // Buat folder jika belum ada
            if ($request->role_id == 2) {
                $folderPath = 'SC/foto/' . $fileName;
            } elseif ($request->role_id == 3) {
                $folderPath = 'OC/foto/' . $fileName;
            }
            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $users->update(['foto' => $folderPath . '/' . $fileName]);
        }
        if ($request->password != null) {
            $users->update([
                'nama' => $request->nama,
                'nif' => $request->nif,
                'nim' => $request->nim,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jk' => $request->jk,
                'prodi' => $request->prodi,
                'department' => $request->department,
                'no_hp' => $request->no_hp,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'username' => $request->username,
                'status_keaktifan' => $request->status_keaktifan,
                'password' => Hash::make($request->password)

            ]);
        } else {
            $users->update([
                'nama' => $request->nama,
                'nif' => $request->nif,
                'nim' => $request->nim,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jk' => $request->jk,
                'prodi' => $request->prodi,
                'department' => $request->department,
                'no_hp' => $request->no_hp,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'username' => $request->username,
                'status_keaktifan' => $request->status_keaktifan,
            ]);
        }

        toast('Berhasil Update Data', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        User::destroy($user_id);
        return back();
    }
    public function userOnlineStatus()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Cache::has('user-online' . $user->id))
                echo $user->name . " is online. <br>";
            else
                echo $user->name . " is offline <br>";
        }
    }
}
