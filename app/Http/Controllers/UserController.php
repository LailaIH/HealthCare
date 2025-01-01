<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function validateData(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'min:10', 'max:10', 'unique:users,phone'],
            'age'=>['required','numeric','min:1','max:95'],

        ]);

        $data['password'] = Hash::make($data['password']);
        
        return $data ;
    }


}
