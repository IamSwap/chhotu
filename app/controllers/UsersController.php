<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController 
{
    public function list(Request $request)
    {
        $users = User::all();
        
        return view('users', compact('users'));
    }
}
