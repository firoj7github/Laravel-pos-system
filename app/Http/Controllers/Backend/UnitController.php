<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;

class UnitController extends Controller
{
     public function index()
   {
   	$allData = Unit::all();
   	return view('layouts.backend.unit.unit-view',compact('allData'));

   }

   public function add()
   {

   	return view('layouts.backend.unit.unit-add');

   }

   public function store(Request $request)
   {
   		$request->validate([
   			'name'=>'required',

   		]);

   		$unit = new Unit();
   		$unit->name =$request->name;
   		$unit->created_by = Auth::user()->id;
   		$unit->save();
   		return redirect()->route('units.index')->with('success','Data Inserted Successfully!');

   }

   public function edit($id)
   {
   	$editData = Unit::find($id);
   	return view('layouts.backend.unit.unit-edit',compact('editData'));
   }

   public function update(Request $request,$id)
   {
   		$request->validate([
   			'name'=>'required',

   		]);
   		$unit = unit::find($id);
   		$unit->name =$request->name;
   		$unit->updated_by = Auth::user()->id;
   		$unit->save();
   		return redirect()->route('units.index')->with('success','Data Updated Successfully!');


   }

   public function delete($id)
   {
   	 $deleteId = unit::find($id);
   	$deleteId->delete();
   	return redirect()->route('units.index')->with('error','Successfully deleted!');
   }
}
