<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Bill;
use Auth;
use DB;
use PDF;

class BillController extends Controller
{
    public function index()
    {
    	$alldata = Bill::orderBy('date','desc')->orderBy('id','desc')->get();
    	return view('layouts.backend.bill.bill-view',compact('alldata'));
    }

    public function add()
    {

    	$data['units']		= Unit::all();
    	$data['category']	= Category::all();
    	$data['products']	= Product::all();

    	return view('layouts.backend.bill.bill-add',$data);
    }

    public function store(Request $request)
    {

    	if($request->category_id != ""){

          $count_category = count($request->category_id);

         for ($i=0; $i <$count_category ; $i++) {

            $bill = new Bill();

            $bill->purchase_no =$request->purchase_no_id[$i];
            $bill->date =date('Y-m-d',strtotime($request->purchase_date[$i]
            ));

            $bill->product_id =$request->product_id[$i];
            $bill->category_id =$request->category_id[$i];
            $bill->quantity =$request->buying_qty[$i];
            $bill->unit_price =$request->unit_price[$i];
            $bill->buying_price =$request->buying_price[$i];
            $bill->created_by =Auth::user()->id;
            $bill->save();

         }

         return redirect()->route('bill.index')->with('success','Data inserted Successfully');

        }else{

             return redirect()->back()->with('error','Sorry! please filap this form');

        }

    }

    public function delete($id)
    {
        $data = Bill::find($id);
        $data->delete();
        return redirect()->back();
    }




	function bill_pdf($id) {

		$data['units']		= Unit::all();
    	$data['category']	= Category::all();
    	$data['products']	= Product::all();
		$data['alldata']= Bill::find($id);

		$pdf = PDF::loadView('layouts.backend.pdf.bill-pdf', $data);
		return $pdf->stream('document.pdf');
	}


}
