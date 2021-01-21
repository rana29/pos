<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\purchase;
use App\product;
use App\supplier;
use App\unit;
use App\catagory;
use Session;

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
      //return $request;
    
     	//return $request;
      
     	 

    	$store=purchase::create([
        	'supplier_id'=>$request->supplier_id,
        	'unit_id'=>$request->unit_id,
        	'cat_id'=>$request->cat_id,
        	'name'=>$request->name,
        	'quantity'=>$request->quantity
  
        	
        	]);

    	//return $data;
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
      Session::flash('success', 'supplier has delete successfully');
      return back(); 
    }


    

     public function showcatagory(Request $request){
     //return $request->all();

      //return $division;

      $catagory=product::where('supplier_id',$request->supplier_id)->get();
      //return $catagory;
      $output='<option value="">Select catagory</option>';

      foreach($catagory as $catagory){

        $output .='<option value="'.$catagory->id.'"> '.$catagory->catagory->name. '</option>';
      }

      //return $catagory->name;
       return $output;
     }


        public function showproduct(Request $request){
        //return $request->all();

      //return $division;

      $product=product::where('cat_id',$request->cat_id)->get();
      //return $catagory;
      $output='<option value="">Select product</option>';

      foreach($product as $product){

        $output .='<option value="'.$product->id.'"> '.$product->name. '</option>';
      }

      //return $product->name;
       return $output;
     }


}
