<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Request data:', $request->all());

            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'telf' => 'required|string|max:15'
            ], [
                'nama.required' => 'Nama harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'telf.required' => 'No Telephone harus diisi.',
            ]);

            $user = new User();
            $user->nama = $validatedData['nama'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);
            $user->telf = $validatedData['telf'];
            $user->user_type = 'customer';
            $user->save();

            return redirect('/login')->with('success', 'Registrasi berhasil.');
        } catch (ValidationException $th) {
            return redirect('/register')->withErrors($th->validator)->withInput();
        } catch (Exception $e) {
            Log::error('Terjadi kesalahan saat registrasi:', ['exception' => $e]);
            return redirect('/register')->with('error', 'Terjadi kesalahan saat registrasi.');
        }
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->user_type == 'admin') {
                return redirect()->intended('/dashboard');
            } elseif ($user->user_type == 'customer') {
                return redirect()->intended('/datatestimoni');
            }
            return redirect()->intended('/');
        }

        Session::flash('loginError', 'Email atau password salah');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
