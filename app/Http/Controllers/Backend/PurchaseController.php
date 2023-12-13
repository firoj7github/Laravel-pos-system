<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Purchase;
use Auth;
use DB;

class PurchaseController extends Controller
{
   public function index()
    {
    	$alldata = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
    	return view('layouts.backend.purchase.purchase-view',compact('alldata'));
    }

    public function add()
    {
    	$data['suppliers']	= Supplier::all();
    	$data['units']		= Unit::all();
    	$data['category']	= Category::all();
    	$data['product']	= Product::all();

    	return view('layouts.backend.purchase.purchase-add',$data);
    }

    public function store(Request $request)
    {

    	if($request->category_id != ""){

          $count_category = count($request->category_id);

         for ($i=0; $i <$count_category ; $i++) { 
            
            $purchase = new Purchase();

            $purchase->purchase_no =$request->purchase_no_id[$i];
            $purchase->date =date('Y-m-d',strtotime($request->purchase_date[$i]
            ));
            $purchase->supplier_id =$request->supplier_id[$i];
            $purchase->category_id =$request->category_id[$i];
            $purchase->product_id =$request->product_id[$i];
            $purchase->quantity =$request->buying_qty[$i];
            $purchase->unit_price =$request->unit_price[$i];
            $purchase->description =$request->description[$i];
            $purchase->buying_price =$request->buying_price[$i];
            $purchase->created_by =Auth::user()->id;
            $purchase->save();

         }

         return redirect()->route('purchase.index')->with('success','Data inserted Successfully');
        
        }else{

             return redirect()->back()->with('error','Sorry! please filap this form');
           
        }
    	
    }

    public function delete($id)
    {
        $data = Purchase::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function purchasePendngList()
    {
       $alldata = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('layouts.backend.purchase.purchase-panding-list',compact('alldata'));
    }

    public function purchaseApproved($id)
    {
       $purchase = Purchase::find($id);
       $product = Product::where('id',$purchase->product_id)->first();
       $purchase_quantity = ((float)($purchase->quantity))+((float)($product->quantity));

       $product->quantity = $purchase_quantity;

       if($product->save()){

        DB::table('purchases')->where('id',$id)->update(['status'=>1]);
       }


        return redirect()->back();

    }
}
