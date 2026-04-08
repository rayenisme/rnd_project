<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register()
    {
        return view('auth-register');
    }

        public function login(Request $request)
        {
            $request->validate([
                'username' => ['required', 'string'],
                'password' => ['required', 'string'],
            ]);

            $username = $request->username;
            $password = $request->password;

            $user = User::where('username', $username)->first();

            // Jika username tidak ditemukan
            if (!$user) {
                return back()
                    ->withErrors(['username' => 'Username tidak ditemukan'])
                    ->withInput(['username' => $username]);
            }

            // Username ditemukan, cek password
            if (!Auth::attempt(['username' => $username, 'password' => $password])) {
                return back()
                    ->withErrors(['password' => 'Password salah'])
                    ->withInput(['username' => $username]);
            }

            
            $request->session()->regenerate();
            $request->session()->put('user_profile', [
                                        'name' => $user->name,
                                        'username' => $user->username,
                                        'email'    => $user->email,
                                    ]);
            $request->session()->flash('login_success', 'Selamat datang, ' . $user->name . '!');
            return redirect()->intended('/index');
        }

    public function logout(Request $request)
    {
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect ke halaman login
    return redirect('/')->with('logout_success', 'Anda berhasil logout');
        Auth::logout();
    }

    public function profile()
    {
        return view('profile');
    }

    public function update(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:50|unique:users,username,' . Auth::id(),
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
    ]);

    if ($validator->fails()) {
        // Redirect back dengan error dan old input
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    // Ambil user login
    $user = Auth::user();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->save();

    // Update session user_profile
    $request->session()->put('user_profile', [
        'name' => $user->name,
        'username' => $user->username,
        'email' => $user->email,
    ]);

    // Redirect back dengan flash message untuk SweetAlert
    return redirect()->back()->with('success', 'Profile berhasil diperbarui');
}

public function passwordUpdate(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->back()->with('success', 'Password berhasil diperbarui');
}
}
