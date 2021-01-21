<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use Session;
use Str;

class BrandController extends Controller
{
     public function create(){

   	  return view('backend.brand.create_brand');
    }

   public function store(Request $request){

   	//return $request;

          $request->validate([
          'Brand_name'=>'required|unique:brands,Brand_name|min:4',
         ]);

    	 Brand::create([
        	'Brand_name'=>$request->Brand_name,
        	'Brand_slug'=>str::slug($request->Brand_name),
        	]);

    	
    		Session::flash('success', 'Brand has added successfully');
   	        return back();
    }



     public function manage(){

     $brand=brand::orderBy('id','asc')->get();

      //return $brand;
   	  return view('backend.brand.manage_brand',compact('brand'));
    }


    public function active($id,$status){

    $brand=brand::find($id);
    $brand->status=$status;
    $brand->save();
    Session::flash('success', 'brand has added successfully');
    return back();

   }

     public function edit($id){

     $brand=brand::find($id);
     return view('backend.brand.edit_brand',compact('brand'));
    }




     public function update(request $request,$id){

      //return $request;
        $request->validate([

          'Brand_name'=>'required|unique:brands,Brand_name|min:3',
        ]);
       
        $update=Brand::find($request->id);
       //return $up;
        $update->Brand_name=$request->Brand_name;
      
        $update->save();
        Session::flash('success', 'brand has update successfully');
        return redirect()->route('brand.manage');
   }


    public function delete($id){
      $delete=brand::find($id);
      $delete->delete();
      Session::flash('success', 'Brand has delete successfully');
      return back();
  }
}
