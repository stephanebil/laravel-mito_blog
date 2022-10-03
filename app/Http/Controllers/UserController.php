<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Return all post view 
     * 
     * @return void
     */
    
    /// methode de all-users.blade.php
    public function allUsers()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(5);
        return view('pages.all-users', compact('users'));
    }
}
