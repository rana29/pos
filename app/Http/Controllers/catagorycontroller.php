<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catagory;
use Session;

class catagorycontroller extends Controller
{
    public function manage(){
    	$catagory=catagory::orderBy ('id','desc')->get();
    	//return $data;
    	return view('backend.catagory.manage_catagory',compact('catagory'));
    }


     public function create(){
    	
    	
    	return view('backend.catagory.create_catagory');
    }


     public function store(Request $request){
      //return $request;
    


     	//return $request;

     	 $request->validate([
          'name'=>'required|min:4',
         
         ]);

    	$store=catagory::create([
        	'name'=>$request->name,
  
        	
        	]);

    	//return $data;
    		Session::flash('success', 'catagory has added successfully');
   	        return back();
    }

    public function edit($id){

    	$edit=catagory::find($id);

    	//return $data;

    	return view('backend.catagory.update_catagory',compact('edit'));

    }

     public function active($id,$status){

    $catagory=catagory::find($id);
    $catagory->status=$status;
    $catagory->save();
    Session::flash('success', 'Catagory has active successfully');
    return back();

   }




     public function update(Request $request,$id){

  	//return $request;

  	  $update=catagory::find($id);

  	

  	  

       $request->validate([
  		'name'=>'required|min:3,id,'.$id, //id dilae same name holae o nibae jodi o unique
  	   ]);
//return $request;
  	    
  	    $update->name=$request->name;
  	    $update->address=$request->address;
  	    $update->mobile=$request->mobile;
    	$update->save();
  
    	Session()->flash('success','catagory has update successfully');
    	return redirect()->back();

}

public function delete($id){

      $delete=catagory::find($id);
     
      $delete->delete();
      Session::flash('success', 'catagory has delete successfully');
      return back(); 
    }
}
