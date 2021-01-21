<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\purchase;
use App\product;
use App\supplier;
use App\unit;
use App\catagory;
use Session;

class defaultcontroller extends Controller
{
    
     public function showcatagory(Request $request){
     //return $request->all();

      //return $division;
      var $supplier_id=$request->supplier_id;
      //dd($supplier_id);
      $catagory=product::select('cat_id')->where('supplier_id',$supplier_id)->groupBy('cat_id')->get();
      //dd ($catagory);
      return response()->json($catagory);

}
}
/*
$(function(){
    $('document').on('change','#supplier_id',function(){
    let supplier_id=$(this).val();
 
     $.ajax({
        
        method:'GET',
        url:"{{route('show.catagory')}}",
        data:{supplier_id:supplier_id},
        success:function(data){
         
        var html='<option value="">select catagory</option>';
        $.each(data,function(key,v){
            html+='<option value="'+v.catagory_id+'">'+v.catagory_id'</option>';

        });
        $('#catagory_id').html(html);
        }
     });
    });

   });*/