<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Oc;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'nim' => 'required|max:255|min:2|unique:ocs,nim',
            'nama' => 'required|max:255|min:2',
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        $oc = new Oc;
        $oc->nim = $request->nim;
        $oc->nama = $request->nama;
        $oc->username = $request->username;
        $oc->email = $request->email;
        $oc->password = Hash::make($request->password);
        $oc->save();

        $user = new User;
        $user->oc_id = $oc->id;
        $user->username = $oc->username;
        $user->email = $oc->email;
        $user->password = $request->password;
        $user->save();
        auth()->login($user);

        return redirect()->route('dashboard_oc')->with('status', 'Registrasi berhasil. Anda sekarang login.');
    }
}
