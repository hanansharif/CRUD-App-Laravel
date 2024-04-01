<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name'=>$incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }
    public function logout(Request $request){
    //    Auth::logout();
       auth()->logout();
        return redirect('/');
    }
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:30', Rule::unique('users', 'name')],
            'email' =>['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:25'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']); //hashing password
        $user = User::create($incomingFields); // create a new user
        auth()->login($user); // login

        return redirect('/');
    }
}
