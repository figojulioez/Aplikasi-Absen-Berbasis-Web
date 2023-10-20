<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class loginController extends Controller
{
    public function show () {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('name', $credentials['nama'])->first();
        if (Auth::attempt(['name' => $credentials['nama'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $user->createToken($credentials['nama'])->plainTextToken;
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nama' => 'The provided credentials do not match our records.',
        ])->onlyInput('nama');
    }

}
