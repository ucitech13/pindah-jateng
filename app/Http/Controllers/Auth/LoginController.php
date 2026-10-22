<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private const MAX_ATTEMPTS = 5;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // 2. Coba Autentikasi User
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Regenerasi session untuk mencegah serangan Session Fixation (WAJIB)
            $request->session()->regenerate();

            // Redirect ke halaman yang dituju sebelumnya atau default ke dashboard
            return redirect()->intended('/dashboard');
        }

        // 3. Jika gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'email' => 'Kredensial yang Anda masukkan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // 1. Logout dari Guard
        Auth::logout();

        // 2. Invalidate session yang sedang berjalan
        $request->session()->invalidate();

        // 3. Regenerasi CSRF Token untuk keamanan
        $request->session()->regenerateToken();

        // 4. Redirect ke halaman login
        return redirect()->route('login');
    }
}
