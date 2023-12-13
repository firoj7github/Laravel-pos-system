<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Challan;
use Auth;
use PDF;

class ChallanController extends Controller
{
     public function index()
   {
   	$allData = Challan::all();
   	return view('layouts.backend.challan.challan-view',compact('allData'));

   }

   public function add()
   {
   		$data['products'] = Product::all();
   		$data['units'] = Unit::all();
   		$data['category'] = Category::all();
   	return view('layouts.backend.challan.challan-add',$data);

   }

   public function store(Request $request)
   {     
         if($request->category_id != ""){

          $count_category = count($request->category_id);

         for ($i=0; $i <$count_category ; $i++) { 
            
            $challan = new Challan();

            $challan->challan_no =$request->challan_no[$i];
            $challan->product_id =$request->product_id[$i];
            $challan->category_id =$request->category_id[$i];
            $challan->unit_id =$request->buying_qty[$i];
            $challan->date =date('Y-m-d',strtotime($request->challan_date[$i]
            ));
            $challan->created_by =Auth::user()->id;
            $challan->save();

         }

         return redirect()->back()->with('success','Data inserted Successfully');
        
        }else{

             return redirect()->back()->with('error','Sorry! please filap this form');
           
        }
   		
   		

   }

   public function edit($id)
   {

   	$data['editData'] = Challan::find($id);
      $data['products'] = Product::all();
      $data['units'] = Unit::all();
      $data['category'] = Category::all();
   	return view('layouts.backend.challan.challan-edit',$data);
   }

   public function update(Request $request,$id)
   {
   		$request->validate([
            'product'=>'required',
            'category'=>'required',
            'unit'=>'required',
            'challan_date'=>'required',
            
         ]);
   		
         $challan = Challan::find($id);
         $challan->product_id =$request->product;
         $challan->category_id =$request->category;
         $challan->unit_id =$request->unit;
         $challan->date =date('Y-m-d',strtotime($request->challan_date));
         $challan->updated_by = Auth::user()->id;
         $challan->save();
         return redirect()->back()->with('success','Data Updated Successfully!');

   }

   public function delete($id)
   {
   	 $deleteId = Challan::find($id);
   	$deleteId->delete();
   	return redirect()->route('challan.index')->with('error','Successfully deleted!');
   }


   function challan_pdf($id) {

      $data['units']    = Unit::all();
      $data['category'] = Category::all();
      $data['products'] = Product::all();
      $data['alldata']= Challan::find($id);

      $pdf = PDF::loadView('layouts.backend.pdf.challan-pdf', $data);
      return $pdf->stream('document.pdf');
   }
}
