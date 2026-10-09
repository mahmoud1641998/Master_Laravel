<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class category extends Controller
{
    //
    public function index(){
        $cats = ["rice"=>20, "wheat"=>15, "sugar"=>10, "salt"=>5];


        return view('category', ["cats" => $cats]);
    }
}
