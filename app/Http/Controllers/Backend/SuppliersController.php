<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;

class SuppliersController extends Controller
{

   public function index()
   {
   	$allData = Supplier::all();
   	return view('layouts.backend.supplier-view',compact('allData'));

   }

   public function add()
   {

   	return view('layouts.backend.suppliers-add');

   }

   public function store(Request $request)
   {
   		$request->validate([
   			'name'=>'required',
   			'mobile'=>'required|max:11',
   			'email'=>'required|unique:suppliers',
   			'address'=>'required'

   		]);

   		$supplier = new supplier();
   		$supplier->name =$request->name;
   		$supplier->mobile =$request->mobile;
   		$supplier->email =$request->email;
   		$supplier->address =$request->address;
   		$supplier->created_by = Auth::user()->id;
   		$supplier->save();
   		return redirect()->route('suppliers.index')->with('success','Data Inserted Successfully!');

   }

   public function edit($id)
   {
   	$editData = supplier::find($id);
   	return view('layouts.backend.suppliers-edit',compact('editData'));
   }

   public function update(Request $request,$id)
   {
   		$request->validate([
   			'name'=>'required',
   			'mobile'=>'required|max:11',
   			'email'=>'required',
   			'address'=>'required'

   		]);
   		$supplier = supplier::find($id);
   		$supplier->name =$request->name;
   		$supplier->mobile =$request->mobile;
   		$supplier->email =$request->email;
   		$supplier->address =$request->address;
   		$supplier->updated_by = Auth::user()->id;
   		$supplier->save();
   		return redirect()->back()->with('success','Data Updated Successfully!');


   }

   public function delete($id)
   {
   	 $deleteId = supplier::find($id);
   	$deleteId->delete();
   	return redirect()->route('suppliers.index')->with('error','Successfully deleted!');
   }





}
