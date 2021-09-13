<?php

namespace App\Http\Controllers;

use App\Models\blogpost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
	{
		$user = Auth::user();
		$blog = blogpost::count();
		$userCount = User::count();
		// dd($blog);
		$request->session()->regenerate();

			if ($user->roll_id == 1) {
				# admin
				return view('adminHome',[
					'blog' => $blog,
					'userCount' => $userCount,
				])->with('message');

			} elseif ($user->roll_id == 2) {
				
				return view('editorHome',[
					'blog' => $blog,
				])->with('message', 'Logged in as editor');
			
			}elseif($user->roll_id=3){
				# user
				$blog=blogpost::all();
                // dd($blog);
                return view('userDashboard',[
                    'blogs' => $blog,
                ]);
			}
			else{
				return redirect()->back()->with('error','Not a user');
			}
		
		
	}
}
