<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
        ]);

        return redirect()->route('login');
    }
    public function login()
    {
        
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validate)) {
            return redirect()->route('prospects.index');
        } else {
            return redirect()->route('register')->with('error', 'utilisateur inconnu');
        }
    }

    public function deconnexion(Request $request)
    { 
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect('/register');
    }
}