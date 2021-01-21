<?php

namespace App\Http\Controllers;
use App\product;
use App\supplier;
use App\unit;
use App\catagory;
use Session;

use Illuminate\Http\Request;

class productcontroller extends Controller
{
     public function manage(){
    	$product=product::orderBy ('id','desc')->get();
    	//return $data;
    	return view('backend.product.manage_product',compact('product'));
    }


     public function create(){
    	
    	$supplier=supplier::all();
    	$unit=unit::all();
    	$catagory=catagory::all();

    	return view('backend.product.create_product',compact('supplier','unit','catagory'));
    }


     public function store(Request $request){
      //return $request;
    
     	//return $request;
      
     	 $request->validate([
          'name'=>'required|min:2',
         
         ]);

    	$store=product::create([
        	'supplier_id'=>$request->supplier_id,
        	'unit_id'=>$request->unit_id,
        	'cat_id'=>$request->cat_id,
        	'name'=>$request->name,
        	'quantity'=>$request->quantity
  
        	
        	]);

    	//return $data;
    		Session::flash('success', 'product has added successfully');
   	        return back();
    }

    public function edit($id){

    	$edit=product::find($id);

    	//return $data;

    	return view('backend.product.update_product',compact('edit'));

    }

     public function active($id,$status){

    $product=product::find($id);
    $product->status=$status;
    $product->save();
    Session::flash('success', 'product has active successfully');
    return back();

   }




     public function update(Request $request,$id){

  	//return $request;

  	  $update=product::find($id);

  	

  	  

       $request->validate([
  		'name'=>'required|min:3,id,'.$id, //id dilae same name holae o nibae jodi o unique
  	   ]);
//return $request;
  	    
  	    $update->name=$request->name;
  	    $update->address=$request->address;
  	    $update->mobile=$request->mobile;
    	$update->save();
  
    	Session()->flash('success','product has update successfully');
    	return redirect()->back();

}


public function delete($id){

    	$delete=product::find($id);
      
    	$delete->delete();
      Session::flash('success', 'supplier has delete successfully');
      return back(); 
    }
}
