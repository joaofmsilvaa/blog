<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(User $user){
        return view('user.profile', compact('user'));
    }
}
