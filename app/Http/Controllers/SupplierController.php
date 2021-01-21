<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier;
use Session;
class SupplierController extends Controller
{
     public function manage(){
    	$supplier=supplier::orderBy ('id','desc')->get();
    	//return $data;
    	return view('backend.supplier.manage_supplier',compact('supplier'));
    }


     public function create(){
    	
    	
    	return view('backend.supplier.create_supplier');
    }


     public function store(Request $request){
      //return $request;
      if ($request->hasfile('image')){

      $image=$request->file('image');
    

      //dd($image);

      $rand=rand(100,1000);
      $ex=$image->getClientOriginalExtension();
      $name=$rand.'.'.$ex;

      //return $name;
      $location=public_path('supplier/');
      $upload=$image->move($location,$name);
      
    }


     	//return $request;

     	 $request->validate([
          'name'=>'required|min:4',
          'mobile'=>'required|min:4',
         ]);

    	$store=supplier::create([
        	'name'=>$request->name,
        	'address'=>$request->address,
        	'mobile'=>$request->mobile,
        	'image'=>$name,
        	]);

    	//return $data;
    		Session::flash('success', 'supplier has added successfully');
   	        return back();
    }

    public function edit($id){

    	$edit=supplier::find($id);

    	//return $data;

    	return view('backend.supplier.update_supplier',compact('edit'));

    }

     public function active($id,$status){

    $supplier=supplier::find($id);
    $supplier->status=$status;
    $supplier->save();
    Session::flash('success', 'Catagory has active successfully');
    return back();

   }




     public function update(Request $request,$id){

  	//return $request;

  	  $update=supplier::find($id);

  	

  	   if ($request->hasfile('image')){

       $image=$request->file('image');
    
       unlink(public_path('supplier/'.$update->image));
      //dd($image);

      $rand=rand(100,1000);
      $ex=$image->getClientOriginalExtension();
      $name=$rand.'.'.$ex;

      //return $name;
      $location=public_path('supplier/');
      $upload=$image->move($location,$name);
      $update->image=$name;
      
    }
    else{
    	$name=$update->image;
    }
  	  

       $request->validate([
  		'name'=>'required|min:3,id,'.$id, //id dilae same name holae o nibae jodi o unique
  	   ]);
//return $request;
  	    
  	    $update->name=$request->name;
  	    $update->address=$request->address;
  	    $update->mobile=$request->mobile;
    	$update->save();
  
    	session()->flash('success','supplier has update successfully');
    	return redirect()->back();

  }




    public function delete($id){

    	$delete=supplier::find($id);
      if(file_exists('supplier/'.$delete->image)){
      unlink(public_path('supplier/'.$delete->image));
      }
    	$delete->delete();
      Session::flash('success', 'supplier has delete successfully');
      return back(); 
    }
  
}
