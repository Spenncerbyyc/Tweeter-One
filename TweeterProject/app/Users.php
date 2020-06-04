<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// make a list of 6 users

class Users extends Model
{
    public function index()
    {
    return view('users');
    }
}


