<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $roles = Role::all();
        return view('home', compact('user', 'roles'));
    }
}
