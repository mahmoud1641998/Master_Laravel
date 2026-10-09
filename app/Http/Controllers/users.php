<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class users extends Controller
{
    //
    public function index(){
        $name = 'Rahul';
        $age = 21;
        return view('users', ["name" => $name, "age" => $age]);
    }
}
