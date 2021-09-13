<?php

namespace App\Http\Controllers\roll;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\blogpost;
use App\Models\RollTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    
    /**
     * returns the view of admin user
     * 
     * @return myprofile
     *
     */

     public function myprofile(){
         $user= Auth::user();
         return view('accounts.myprofile',[
             'users'=>$user,
         ]);
     }

     /**
      * @return manageUser
      * return Manage users
      */

      public function manageuser(Request $request){
          $data= User::all();
        //   dd($user);
        if ($request->ajax()) {
          return DataTables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){
                        $btn = ' <a class="btn btn-sm btn-primary" href="editUser/'.$row->id.'" ><i class="fas fa-edit"></i></a>';
                        // $btn .= ' <a class="delete btn btn-outline-danger" href="deleteUser/'.$row->id.'"><i class="fas fa-trash-alt"></i></a>';
                        $btn .= '<a class="delete-data btn btn-sm btn-danger" href="javascript:void(0)" data-toggle="modal" data-target="#modelDelete" data-id="'.$row->id.'" title="Delete"><i class="fa fa-trash"></i></a> ';
                        $btn .= ' <a class=" btn btn-outline-primary" href="viewUser/'.$row->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                          return $btn;
                  })
                  ->rawColumns(['action'])
                  ->make(true);
      }
          return view('accounts.manageuser',[
              'users' => $data,
          ]);
      }

      /**
       * @return viewnewUserCreate
       */
      public function createUser(){
          $roles = RollTable::all();
          return view('accounts.createUser',[
            'roles' => $roles,
          ]);
      }

      public function storeUser(Request $request){
        // $user = User::where('id',$id)->firstOrFail();
        // dd($request->roll_id);
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'roll_id' => 'required',
        ]);

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'roll_id' => $request->roll_id,
        ]);
        return redirect('/manageUser')->with('message','User has been Created');
      }



      /**
       * 
       * @return editView
       */

      public function editUser($id){
          $user = User::where('id',$id)->firstOrFail();
          $roles = RollTable::all();
        //  dd($roll);
          return view('accounts.editUser',[
            'users'=>$user,
            'roles' => $roles
          ]);
          
      }
      /**
       * Update editView
       */

      public function updateUser(Request $request , $id){
        # Validating Manually
        // app(UserRequest::class);
        // dd($request->all());
        $this->validate($request, [
          'name' => 'required|min:2',
          'email' => 'required|unique:users,email',
          'roll_id' => 'required',
        ]);
        $res = User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'roll_id'  => $request->roll_id,
        ]);
        
        if($res == 0){
          back()->with('error','User has not been updated');
        }
      
        return redirect('/manageUser')->with('message','User has been updated');
      }

      public function deleteUser($id){
          $user = User::where('id',$id)->firstOrFail();
          $user->delete();
          return redirect()->back()->with('success','User has been deleted');
      }

      public function viewUser($id){
          $user = User::where('id',$id)->firstOrFail(); 
          return view('accounts.viewUser',[
            'users' => $user,
          ]);
      }

}


