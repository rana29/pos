<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\supplier;
use App\unit;
use App\catagory;
use Session;

class StockController extends Controller
{
   
   	  public function manage(){
    	$product=product::orderBy ('supplier_id','asc')->orderBy('cat_id','asc')->get();
    	//return $data;
    	return view('backend.stock.manage_stock',compact('product'));
    }

    public function supplier_stock(){
    	$data['supplier']=supplier::all();
    	return view('backend.stock.supplier_stock',$data);
    }

     public function supplier_stock_report(Request $request){

     	//dd($request->all());

     	$data['product']=product::orderBy ('supplier_id','asc')->where('supplier_id',$request->supplier_id)->get();

     	//dd($product);
    	
    	return view('backend.stock.supplier_stock_report',$data);
    }
   
}
