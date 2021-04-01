<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\purchase;
use App\product;
use App\supplier;
use App\customer;
use App\unit;
use App\catagory;
use App\invoice;
use App\invoicedetils;
use App\payment;
use App\paymentdetils;
use Session;
use DB;
use Auth;


class invoicecontroller extends Controller
{
     public function manage(){
    	$invoice=invoice::orderBy ('id','desc')->where('status','1')->get();
    	//return $data;
    	return view('backend.invoice.manage_invoice',compact('invoice'));
    }


     public function create(){
    	
    	
    	$data['catagory']=catagory::all();
    	$data['customer']=customer::all();
    	$data['date']=date('d-m-y');
    	$invoice_data=invoice::orderBy('id','desc')->first();

    	if($invoice_data==null){
        $first=0;
        $data['invoice_no']=$first+1;
    	}else{

    	$invoice_data=invoice::orderBy('id','desc')->first()->invoice_no;
    	$data['invoice_no']=$invoice_data+1;	

    	}

    	return view('backend.invoice.create_invoice',$data);
    }



    public function current_stock(Request $request){

    	$product_id=$request->product_id; //ai id ta ajax er madhomae pass kora hoyachae
    	$current_stock=product::where('id',$product_id)->first()->quantity; //quantity holo product table er quantity
    	//dd($current_stock);
    	return response()->json($current_stock);
    }




     public function store(Request $request){
      //dd($request->all());


    
     	if($request->cat_id==null){
        return redirect()->back()->with('success', 'paid amount must be less than total amount');
      }

      else{

      	if($request->paid>$request->estimate){
      		return redirect()->back()->with();
      	}else{

      		 $invoice=new invoice();
      		 $invoice->invoice_no=$request->invoice_no;
      		 $invoice->date=date('y-m-d',strtotime($request->date));
      		 $invoice->description=$request->description;
      		 $invoice->status=0;
      		 $invoice->created_by=Auth::user()->id;
      		 DB::transaction(function() use($request,$invoice) {

      		  if($invoice->save()){
      		  	$cat_count=count($request->cat_id);
      		  	for($i=0; $i<$cat_count; $i++){

      		  	   $invoicedetils=new invoicedetils();

                 $invoicedetils->date=date('y-m-d',strtotime($request->date));
                 $invoicedetils->invoice_id=$invoice->id;
                 $invoicedetils->cat_id=$request->cat_id[$i];
                 $invoicedetils->product_id=$request->product_id[$i];
                 $invoicedetils->selling_qty=$request->selling_qty[$i];
                 $invoicedetils->unit_price=$request->unit_price[$i];
                 $invoicedetils->selling_price=$request->selling_price[$i];
                 $invoicedetils->status='1';
                 $invoicedetils->save();
      		  	}


      		  	if($request->customer_id=='0'){

      		  		$customer=new customer();
      		  		$customer->name=$request->name;
      		  		$customer->mobile=$request->mobile;
      		  		$customer->address=$request->address;
      		  		$customer->save();
      		  		$customer_id=$customer->id;


      		  	}else{
      		  		$customer_id=$request->customer_id;
      		  	}

      		  	$payment=new payment();
      		  	$paymentdetils=new paymentdetils();

      		  	$payment->invoice_id=$invoice->id;
      		  	$payment->customer_id=$customer_id;
      		  	$payment->paid_status=$request->paid_status;
      		  	$payment->due=$request->due;
      		  	$payment->discount=$request->discount;
      		  	$payment->total=$request->estimate;
      		  	if($request->paid_status=='full_paid'){
      		  		$payment->paid=$request->estimate;
      		  		$payment->due='0';
      		  		$paymentdetils->current_paid=$request->estimate;
      		  	}
      		  	elseif($request->paid_status=='full_due'){
      		  		$payment->paid='0';
      		  		$payment->due=$request->estimate;
      		  		$paymentdetils->current_paid='0';

      		  	}
      		  		elseif($request->paid_status=='partial_paid'){
      		  		$payment->paid=$request->paid;
      		  		$payment->due=$request->estimate-$request->paid;
      		  		$paymentdetils->current_paid=$request->paid;

      		  	}
      		  	$payment->save();
      		  	$paymentdetils->invoice_id=$invoice->id;
      		  	$paymentdetils->updated_by=Auth::user()->id;
      		  	$paymentdetils->date=date('y-m-d',strtotime($request->date));
      		  	$paymentdetils->save();

      		  }
      		});                 
        
        }
      }
      
     	 
     Session::flash('success', 'invoice has added successfully');
   	 return back();
    }








    public function edit($id){

    	$edit=invoice::find($id);

    	//return $data;

    	return view('backend.invoice.update_invoice',compact('edit'));

    }

     public function active($id,$status){

    $invoice=invoice::find($id);
    $invoice->status=$status;
    $invoice->save();
    Session::flash('success', 'invoice has active successfully');
    return back();

   }




     public function update(Request $request,$id){

  	//return $request;

  	  $update=invoice::find($id);

  	

  	  

       $request->validate([
  		'name'=>'required|min:3,id,'.$id, //id dilae same name holae o nibae jodi o unique
  	   ]);
//return $request;
  	    
  	    $update->name=$request->name;
  	    $update->address=$request->address;
  	    $update->mobile=$request->mobile;
    	$update->save();
  
    	Session()->flash('success','invoice has update successfully');
    	return redirect()->back();

}


     public function delete($id){

    	$invoice=invoice::find($id);
      
    	$invoice->delete();
      invoicedetils::where('invoice_id',$invoice->id)->delete();
      payment::where('invoice_id',$invoice->id)->delete();
      paymentdetils::where('invoice_id',$invoice->id)->delete();
      Session::flash('success', 'invoice has delete successfully');
      return back(); 
    }



    public function pending_list(){

       
      $invoice=invoice::orderBy ('id','desc')->where('status','0')->get();
      //return $data;
      return view('backend.invoice.pending_invoice',compact('invoice'));
  
    }

    public function pending_approved($id){
      //$id=$request->input('id');
      $invoice=invoice::with(['invoicedetils'])->find($id);
      //dd($invoice);
     return view('backend.invoice.approved_invoice',compact('invoice'));
    }


     public function approved_store(Request $request,$id){

     foreach($request->selling_qty as $key=>$val){
      $invoicedetils=invoicedetils::where('id',$key)->first();
      $product=product::where('id',$invoicedetils->product_id)->first();
      if($product->quantity<$request->selling_qty[$key]){
      return redirect()->back()->with('success', 'quantity amount must be less than total quqntity');

      }
     }
     
     $invoice=invoice::find($id);
     //$invoice->approved_by=Auth::user()->id;
     $invoice->status='1';
      DB::transaction(function() use($request,$invoice,$id) {
        foreach($request->selling_qty as $key=>$val){
        $invoicedetils=invoicedetils::where('id',$key)->first();
        $product=product::where('id',$invoicedetils->product_id)->first();
        $product->quantity=((float)$product->quantity)-((float)$request->selling_qty[$key]);
        $product->save();

        }
        $invoice->save();

      });

      return redirect()->back()->with('success', 'pending approved success');

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



     public function daily_report(){

      return view('backend.invoice.daily_invoice');
     }

     public function daily_report_show(Request $request){
      $s_date=date('y-m-d',strtotime($request->start));
      $e_date=date('y-m-d',strtotime($request->end));
      
      $data['invoice']=invoice::whereBetween('date',[$s_date,$e_date])->where('status','1')->get();
      $data['s_date']=date('y-m-d',strtotime($request->start));
      $data['e_date']=date('y-m-d',strtotime($request->end));

      return view('backend.invoice.show_daily_invoice',$data);
     }
}
