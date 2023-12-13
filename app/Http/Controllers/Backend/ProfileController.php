<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {

    	$id = Auth::user()->id;
    	$user = user::find($id);
    	return view('layouts.profile-view',compact('user'));
    }

    public function edit()
    {
    	$id = Auth::user()->id;
    	$edit_user = user::find($id);
    	return view('layouts.profile-edit',compact('edit_user'));
    }

    public function update(Request $request)
    {
    	
    	$id = Auth::user()->id;
    	$data = User::find($id);

    	$request->validate([
       
        'name'=>'required|max:20',
        'address'=>'required',
        'mobile'=>'required',
        'gender'=>'required',
        'email'=>'required',
   		]);
    	 
        $data->name= $request->name;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
         $data->gender= $request->gender;
         if($request->file('image')){

         	$file =$request->file('image');
         	@unlink(public_path('/user_images/upload_img/'.$data->image));

         	$filename = date('YmdHi').$file->getClientOriginalName();
         	$file->move(public_path('/user_images/upload_img'),$filename);
         	$data['image']= $filename;
         }

         $data->save();
        return redirect()->route('profile.index')->with('success','Profile Successfully Updated!');
    }


    public function Editpassword()
    {
    	return view('layouts.edit-password');
    }

    public function updatePassword(Request $request)
    {
    	$id =Auth::user()->id;
    	$user =user::find($id);
    	if(Auth::attempt(['id'=>$id,'password' =>$request->old_password])){
    		
    		$user->password = bcrypt($request->new_password);
    		$user->save();
    		return redirect()->route('profile.index')->with('success','Password Change Successfully!');
    		
    	}else{

    		return redirect()->back()->with('error','Current Password does not match!');
    	}
    }
}
