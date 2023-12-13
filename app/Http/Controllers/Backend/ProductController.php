<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
    	$alldata = Product::all();
    	return view('layouts.backend.product.product-view',compact('alldata'));
    }

    public function add()
    {
    	$data['suppliers']	= Supplier::all();
    	$data['units']		= Unit::all();
    	$data['category']	= Category::all();

    	return view('layouts.backend.product.product-add',$data);
    }

    public function store(Request $request)
    {

    	$product = new Product();
    	$product->supplier_id =$request->supplier_id;
    	$product->unit_id =$request->unit_id;
    	$product->category_id =$request->category_id;
    	$product->name =$request->name;
        $product->created_by = Auth::user()->id;
    	$product->save();
    	return redirect()->route('product.index')->with('success','Product Inserted Successfully');


    }

    public function edit($id)
    {
        $data['editData'] = Product::find($id);
        $data['suppliers']  = Supplier::all();
        $data['units']      = Unit::all();
        $data['category']   = Category::all();
        return view('layouts.backend.product.product-edit',$data);
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->supplier_id =$request->supplier_id;
        $product->unit_id =$request->unit_id;
        $product->category_id =$request->category_id;
        $product->name =$request->name;
        $product->updated_by = Auth::user()->id;
        $product->save();
        return redirect()->route('product.index')->with('success','Data Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back();
    }
}
