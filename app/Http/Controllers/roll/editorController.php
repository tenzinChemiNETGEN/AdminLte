<?php

namespace App\Http\Controllers\roll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class editorController extends Controller
{
    public function index(){
        return view('editorHome')->with('message', 'Logged in as editor');
    }
}
