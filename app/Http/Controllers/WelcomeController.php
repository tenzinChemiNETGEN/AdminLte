<?php

namespace App\Http\Controllers;

use App\Models\blogpost;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        // dd(get_declared_classes());
        $blog = blogpost::all();

        return view('welcome',[
            'blogs' => $blog,
        ]);
    }
}
