<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if(Auth::check()){
            Session::flash('info', 'you are already logged in !');
            return redirect()->back();
        }
        return view('auths.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auths.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
    //    dd(Auth::user()->roll_id);
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return redirect('/login')->with('error','Enter Correct Email and Password');
        }
        else{
            //redirecting based on roll id.
            if(Auth::user()->roll_id == 1)
            {
               
                return redirect()->route('home')->with('message','You are logged In!');
            }

            elseif(auth()->user()->roll_id == 2)
            {
                
                return redirect()->route('home')->with('message','You are logged In as Editor!');
            }
            elseif(auth()->user()->roll_id == 3){
              
                return redirect()->route('home')->with('message','You are logged In as User!');
            }
            else{
                return redirect('/login')->with('error','Enter correct data');
            }
        }
    }
    
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
          
        ]);
        //  dd($request->all());
        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        

        Auth::login($user);
         
        return redirect("/home")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        Session::flash('success', 'You are now logged out !');
        return Redirect('/login');
    }

}
