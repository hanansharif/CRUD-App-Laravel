<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' =>['required', 'email'],
            'password' => ['required', 'min:5', 'max:25'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']); //hashing password
        User::create($incomingFields); // create a new user

        return "Hello from our controller";
    }
}
