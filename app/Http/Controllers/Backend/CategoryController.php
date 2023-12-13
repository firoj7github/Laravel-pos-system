<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
      public function index()
   {
   	$allData = Category::all();
   	return view('layouts.backend.category.category-view',compact('allData'));

   }

   public function add()
   {

   	return view('layouts.backend.category.category-add');

   }

   public function store(Request $request)
   {
   		$request->validate([
   			'name'=>'required',
   			
   		]);

   		$category = new category();
   		$category->name =$request->name;
   		$category->created_by = Auth::user()->id;
   		$category->save();
   		return redirect()->back()->with('success','Data Inserted Successfully!');

   }

   public function edit($id)
   {
   	$editData = Category::find($id);
   	return view('layouts.backend.category.category-edit',compact('editData'));
   }

   public function update(Request $request,$id)
   {
   		$request->validate([
   			'name'=>'required',
   			
   		]);
   		$category = category::find($id);
   		$category->name =$request->name;
   		$category->updated_by = Auth::user()->id;
   		$category->save();
   		return redirect()->route('category.index')->with('success','Data Updated Successfully!');


   }

   public function delete($id)
   {
   	 $deleteId = category::find($id);
   	$deleteId->delete();
   	return redirect()->route('category.index')->with('error','Successfully deleted!');
   }
}
