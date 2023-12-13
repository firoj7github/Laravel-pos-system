<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class CustomerController extends Controller
{
    public function index()
   {
   	$allData = Customer::all();
   	return view('layouts.backend.customer.customer-view',compact('allData'));

   }

   public function add()
   {

   	return view('layouts.backend.customer.customer-add');

   }

   public function store(Request $request)
   {
   		$request->validate([
   			'name'=>'required',
   			'mobile'=>'required|max:11',
   			'address'=>'required'

   		]);

   		$customer = new Customer();
   		$customer->name =$request->name;
   		$customer->mobile =$request->mobile;
   		$customer->email =$request->email;
   		$customer->address =$request->address;
   		$customer->created_by = Auth::user()->id;
   		$customer->save();
   		return redirect()->route('customers.index')->with('success','Data Inserted Successfully!');

   }

   public function edit($id)
   {
   	$editData = customer::find($id);
   	return view('layouts.backend.customer.customer-edit',compact('editData'));
   }

   public function update(Request $request,$id)
   {
   		$request->validate([
   			'name'=>'required',
   			'mobile'=>'required|max:11',
   			'address'=>'required'

   		]);
   		$customer = customer::find($id);
   		$customer->name =$request->name;
   		$customer->mobile =$request->mobile;
   		$customer->email =$request->email;
   		$customer->address =$request->address;
   		$customer->updated_by = Auth::user()->id;
   		$customer->save();
   		return redirect()->route('customers.index')->with('success','Data Updated Successfully!');


   }

   public function delete($id)
   {
   	 $deleteId = customer::find($id);
   	$deleteId->delete();
   	return redirect()->route('customers.index')->with('error','Successfully deleted!');
   }


}
