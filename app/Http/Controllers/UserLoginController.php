<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserLoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Loginpage',
            'active' => 'login',
        ];
        return view('frontend.login', $data);
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required'=>'email harus diisi',
            'email.email'=>'email harus sesuai (ex:Example@gmail.com)!',
            'password.required'=>'Password Harus diisi',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->with('info', 'Email atau password Anda salah!');
    }
    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi Pelanggan',
            'active' => 'registrasi',
        ];
        return view('frontend.registrasi', $data);
    }
    public function prosesRegister(Request $request)
    {
       $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pelanggan,email',
            'no_hp' => 'required',
            'password' => 'required',
            'password1' => 'required|same:password',
       ],[
            'nama' => 'Nama Harus diisi dengan lengkap..',
            'email.required' => 'email Harus diisi ..',
            'email.unique' => 'email tidak bole sama  diisi ..',
            'no_hp' => 'nomer Handphone harus diisi ..',
            'password.required' => 'Password harus diisi ..',
            'password1.required' => 'Password konfirmasi harus diisi ..',
            'password1.same' => 'Password harus sama dengan di atas harus diisi ..',

       ]);

       $validateData['password'] = bcrypt($request->password);

       Pelanggan::create($validateData);
       return Redirect('/loginuser')->with('info', 'Registrasi Berhasil, Silahkan login dengan akun yang telah di buat');
    }
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        return redirect()->route('home');
        // return redirect('/');
    }
}
