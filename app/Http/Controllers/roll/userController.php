<?php

namespace App\Http\Controllers\roll;

use App\Http\Controllers\Controller;
use App\Models\blogpost;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $blog=blogpost::all();
        dd($blog);
        return view('userDashboard',[
            'blogs' => $blog,
        ]);
    }


}
