<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {

        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'Email wajib diisi!',
            'password.required' => 'Password wajib diisi!'
        ]);

        // cek apakah login valid

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('home');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('home');
            }
        }

        Session::flash('status', 'Gagal!');
        Session::flash('message', 'Login Tidak Valid!');
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'Sukses');
        Session::flash('message', 'Registrasi Sukses, silahkan login');
        return view('login');
    }
}
