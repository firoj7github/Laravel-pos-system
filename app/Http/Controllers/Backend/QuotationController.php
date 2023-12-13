<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Quotation;
use Auth;
use PDF;

class QuotationController extends Controller
{
     public function index()
   {
   	$allData = Quotation::all();
   	return view('layouts.backend.quotation.quotation-view',compact('allData'));

   }

   public function add()
   {
   		$data['products'] = Product::all();
   		$data['units'] = Unit::all();
   		$data['category'] = Category::all();
   	return view('layouts.backend.quotation.quotation-add',$data);

   }

   public function store(Request $request)
   {
   		if($request->category_id != ""){

          $count_category = count($request->category_id);

         for ($i=0; $i <$count_category ; $i++) { 
            
            $quotation = new Quotation();

            $quotation->quotation_no =$request->quotation_no[$i];
            $quotation->product_id =$request->product_id[$i];
            $quotation->category_id =$request->category_id[$i];
            $quotation->unit_id =$request->buying_qty[$i];
            $quotation->unit_price =$request->unit_price[$i];
            $quotation->buying_price =$request->buying_price[$i];
            $quotation->date =date('Y-m-d',strtotime($request->quotation_date[$i]
            ));
            $quotation->created_by =Auth::user()->id;
            $quotation->save();

         }

         return redirect()->route('quotation.index')->with('success','Data inserted Successfully');
        
        }else{

             return redirect()->back()->with('error','Sorry! please filap this form');
           
        }
   }

   public function edit($id)
   {

   	$data['editData'] = Quotation::find($id);
      $data['products'] = Product::all();
      $data['units'] = Unit::all();
      $data['category'] = Category::all();
   	return view('layouts.backend.quotation.quotation-edit',$data);
   }

   public function update(Request $request,$id)
   {
   		$request->validate([
            'product'=>'required',
            'description'=>'required',
            'category'=>'required',
            'unit'=>'required',
            'unit_price'=>'required',
            'buying_price'=>'required',
            'quotation_date'=>'required',
            
         ]);
   		
         $quotation = Quotation::find($id);
         $quotation->product_id =$request->product;
         $quotation->description =$request->description;
         $quotation->category_id =$request->category;
         $quotation->unit_id =$request->unit;
         $quotation->unit_price =$request->unit_price;
         $quotation->buying_price =$request->buying_price;
         $quotation->date =date('Y-m-d',strtotime($request->quotation_date));
         $quotation->updated_by = Auth::user()->id;
         $quotation->save();
         return redirect()->back()->with('success','Data Updated Successfully!');

   }

   public function delete($id)
   {
   	 $deleteId = Quotation::find($id);
   	$deleteId->delete();
   	return redirect()->route('quotation.index')->with('error','Successfully deleted!');
   }


   function quotation_pdf($id) {

      $data['units']    = Unit::all();
      $data['category'] = Category::all();
      $data['products'] = Product::all();
      $data['alldata']= Quotation::find($id);

      $pdf = PDF::loadView('layouts.backend.pdf.quotation-pdf', $data);
      return $pdf->stream('document.pdf');
   }
}
