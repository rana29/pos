<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use Session;

class customercontroller extends Controller
{
      public function manage(){
    	$customer=customer::orderBy ('id','desc')->get();
    	//return $data;
    	return view('backend.customer.manage_customer',compact('customer'));
    }


     public function create(){
    	
    	
    	return view('backend.customer.create_customer');
    }


     public function store(Request $request){
      //return $request;
    


     	//return $request;

     	 $request->validate([
          'name'=>'required|min:4',
          'mobile'=>'required|min:4',
         ]);

    	$store=customer::create([
        	'name'=>$request->name,
        	'address'=>$request->address,
        	'mobile'=>$request->mobile,
        	
        	]);

    	//return $data;
    		Session::flash('success', 'customer has added successfully');
   	        return back();
    }

    public function edit($id){

    	$edit=customer::find($id);

    	//return $data;

    	return view('backend.customer.update_customer',compact('edit'));

    }

     public function active($id,$status){

    $customer=customer::find($id);
    $customer->status=$status;
    $customer->save();
    Session::flash('success', 'Catagory has active successfully');
    return back();

   }




     public function update(Request $request,$id){

  	//return $request;

  	  $update=customer::find($id);

  	

  	  

       $request->validate([
  		'name'=>'required|min:3,id,'.$id, //id dilae same name holae o nibae jodi o unique
  	   ]);
//return $request;
  	    
  	    $update->name=$request->name;
  	    $update->address=$request->address;
  	    $update->mobile=$request->mobile;
    	$update->save();
  
    	Session()->flash('success','customer has update successfully');
    	return redirect()->back();

  }




    public function delete($id){

    	$delete=customer::find($id);
      if(file_exists('customer/'.$delete->image)){
      unlink(public_path('customer/'.$delete->image));
      }
    	$delete->delete();
      Session::flash('success', 'customer has delete successfully');
      return back(); 
    }
}
