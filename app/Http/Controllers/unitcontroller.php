<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\unit;
use Session;


class unitcontroller extends Controller
{
     public function manage(){
    	$unit=unit::orderBy ('id','desc')->get();
    	//return $data;
    	return view('backend.unit.manage_unit',compact('unit'));
    }


     public function create(){
    	
    	
    	return view('backend.unit.create_unit');
    }


     public function store(Request $request){
      //return $request;
    


     	//return $request;

     	 $request->validate([
          'name'=>'required|min:2',
         
         ]);

    	$store=unit::create([
        	'name'=>$request->name,
  
        	
        	]);

    	//return $data;
    		Session::flash('success', 'unit has added successfully');
   	        return back();
    }

    public function edit($id){

    	$edit=unit::find($id);

    	//return $data;

    	return view('backend.unit.update_unit',compact('edit'));

    }

     public function active($id,$status){

    $unit=unit::find($id);
    $unit->status=$status;
    $unit->save();
    Session::flash('success', 'Catagory has active successfully');
    return back();

   }




     public function update(Request $request,$id){

  	//return $request;

  	  $update=unit::find($id);

  	

  	  

       $request->validate([
  		'name'=>'required,id,'.$id, //id dilae same name holae o nibae jodi o unique
  	   ]);
//return $request;
  	    
  	    $update->name=$request->name;
  	    $update->address=$request->address;
  	    $update->mobile=$request->mobile;
    	$update->save();
  
    	Session()->flash('success','unit has update successfully');
    	return redirect()->back();

}
}