<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'Sign up'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:admins|min:6|max:255',
            'email' => 'required|unique:admins|email:rfc,dns',
            'password' => [ 'required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Admins::create($validatedData);

        // $request->session()->flash('success', 'Akun berhasil di buat');

        return redirect('/signin')->with('success', 'Akun has been added');
    }
}
