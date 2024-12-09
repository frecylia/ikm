<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function loginAuth(Request $request){
        // Validasi input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Coba dapatkan pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika pengguna ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Buat session atau token autentikasi
            Auth::login($user);
            return redirect('dashboard');
        }

        return redirect('/user/login')->with('error', 'Login gagal. Silakan coba lagi.');
    }
    public function profile(){

    }

    public function logout(){
        Auth::logout();
        return view('user.login');
    }
}