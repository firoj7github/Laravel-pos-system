<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UsersController extends Controller
{

	//User View Method
    public function index()
    {
    	//$data = user::all();
    	$data = DB::table('users')->get();
    	return view('layouts.view-users',compact('data'));
    }

    //User Edit Method
    public function edit($id)
    {
    	$edit = DB::table('users')->where('id',$id)->first();

    	return view('layouts.edit-user',compact('edit'));
    }

    //User Update Method
    public function update(Request $request,$id)
    {
    	 $request->validate([
        'role'=>'required',  
        'name'=>'required|max:20',
        'email'=>'required',
   		]);

    	 $data = array(
    	 'role'=>$request->role,
        'name' => $request->name,
        'email' => $request->email,
         );

      DB:: table('users')->where('id',$id)->update($data); 
        return redirect()->route('users.index')->with('success','Successfully Updated!');

    }


    // User Add Method
    	
    public function add()
    {
    	return view('layouts.user-add');
    }

    // User Store Method

    public function store(Request $request)
    {
    	$request->validate([
        'role'=>'required',  
        'name'=>'required|max:20',
        'email'=>'required|unique:users',
        'password'=>'required|min:8',
        'cpassword'=>'required|min:8',
   		]);

   		 $data = array(
    	 'role'=>$request->role,
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        
         );

         DB::table('users')->insert($data);
         return redirect()->back()->with('success','Successfully Inserted!');

    }

    //Delete User Method

    public function delete($id)
    {
    	DB::table('users')->where('id',$id)->delete();

    	return redirect()->route('users.index');
    }
}
