<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\purchase;
use App\product;
use App\supplier;
use App\unit;
use App\catagory;
use Session;
use DB;

class purchasecontroller extends Controller
{
      public function manage(){
    	$purchase=purchase::orderBy ('id','desc')->get();
    	//return $data;
    	return view('backend.purchase.manage_purchase',compact('purchase'));
    }


     public function create(){
    	
    	$supplier=supplier::all();
    	$unit=unit::all();
    	$catagory=catagory::all();

    	return view('backend.purchase.create_purchase',compact('supplier','unit','catagory'));
    }


     public function store(Request $request){
      //dd($request->all());
    
     	if($request->cat_id==null){
        return redirect()->back();
      }

      else{
        $cat_count=count($request->cat_id);
        for($i=0; $i<$cat_count; $i++){
          $purchase=new purchase();
          $purchase->date=date('y-m-d',strtotime($request->date[$i]));
        
          $purchase->supplier_id=$request->supplier_id[$i];
          $purchase->product_id=$request->product_id[$i];
          $purchase->purchase_no=$request->purchase_no[$i];
          $purchase->cat_id=$request->cat_id[$i];
          $purchase->buying_qty=$request->buying_qty[$i];
          $purchase->unit_price=$request->unit_price[$i];
          $purchase->buying_price=$request->buying_price[$i];
          $purchase->description=$request->description[$i];
          $purchase->save();
        
        }
      }
      
     	 
    		Session::flash('success', 'purchase has added successfully');
   	        return back();
    }

    public function edit($id){

    	$edit=purchase::find($id);

    	//return $data;

    	return view('backend.purchase.update_purchase',compact('edit'));

    }

     public function active($id,$status){

    $purchase=purchase::find($id);
    $purchase->status=$status;
    $purchase->save();
    Session::flash('success', 'purchase has active successfully');
    return back();

   }




     public function update(Request $request,$id){

  	//return $request;

  	  $update=purchase::find($id);

  	

  	  

       $request->validate([
  		'name'=>'required|min:3,id,'.$id, //id dilae same name holae o nibae jodi o unique
  	   ]);
//return $request;
  	    
  	    $update->name=$request->name;
  	    $update->address=$request->address;
  	    $update->mobile=$request->mobile;
    	$update->save();
  
    	Session()->flash('success','purchase has update successfully');
    	return redirect()->back();

}


     public function delete($id){

    	$delete=purchase::find($id);
      
    	$delete->delete();
      Session::flash('success', 'purchase has delete successfully');
      return back(); 
    }



    public function pending_list(){

       
      $purchase=purchase::orderBy ('id','desc')->where('status',0)->get();
      //return $data;
      return view('backend.purchase.pending_purchase',compact('purchase'));
  
    }

    public function pending_approved($id){
      //$id=$request->input('id');
      $purchase=purchase::find($id);
      //dd($purchase);
      $product=product::where('id',$purchase->product_id)->first();
      //dd($product);
      $purchase_qty=((float)($purchase->buying_qty))+((float)($product->quantity));
      $product->quantity=$purchase_qty;
      if($product->save()){
        DB::table('purchases')
             ->where('id',$id)
             ->update(['status'=>1]);
      }

      return redirect()->back();
    }


    

     public function showcatagory(Request $request){
     //dd($request->all());

      

      $catagory=product::select('cat_id')->where('supplier_id',$request->supplier_id)->groupBy('cat_id')->get();
      //dd($catagory);
      $output='<option value="">Select catagory</option>';

      foreach($catagory as $catagory){

        $output .='<option value="'.$catagory->cat_id.'"> '.$catagory->catagory->name. '</option>';
      }

      //return $catagory->name;
       return $output;
     }


        public function showproduct(Request $request){
        //return $request->all();

      //return $division;

      $product=product::where('cat_id',$request->cat_id)->get();
      //dd($product);
      $output='<option value="">Select product</option>';

      foreach($product as $product){

        $output .='<option value="'.$product->id.'"> '.$product->name. '</option>';
      }

      //return $product->name;
       return $output;
     }


}
