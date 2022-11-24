<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_admin',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);
        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);
        
        return redirect('/login')->with('success', 'Berhasil Daftar! Silakan Login');
    }
}
