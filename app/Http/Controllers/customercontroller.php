<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\payment;
use App\paymentdetils;
use Session;
use Auth;

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


    public function credit(){

      $payment=payment::whereIn('paid_status',['partial_paid','full_due'])->get();
      //dd($payment);

      return view('backend.customer.credit_customer',compact('payment'));
    }


    public function credit_edit($invoice_id){
      $payment=payment::where('invoice_id',$invoice_id)->first();
      //return $payment;
      return view('backend.customer.credit_edit_customer',compact('payment'));
    }


    public function credit_update(Request $request,$invoice_id){
      //dd($request->all());
      if($request->new_paid < $request->paid){
        return redirect()->back();
      }else{
        $payment=payment::where('invoice_id',$invoice_id)->first();
        $paymentdetils=new paymentdetils();
        $payment->paid_status=$request->paid_status;


        if($request->paid_status=='full_paid'){
          $payment->paid=payment::where('invoice_id',$invoice_id)->first()['paid']+$request->new_paid;
          //$payment->due=payment::where('invoice_id',$invoice_id)->first()['due']-$request->paid;
          $payment->due='0';
          $paymentdetils->current_paid=$request->new_paid;
        }

        elseif($request->paid_status=='partial_paid'){

          $payment->paid=payment::where('invoice_id',$invoice_id)->first()['paid']+$request->paid;
          $payment->due=payment::where('invoice_id',$invoice_id)->first()['due']-$request->paid;
          $paymentdetils->current_paid=$request->paid;

        }
        $payment->save();
        $paymentdetils->invoice_id=$invoice_id;
        $paymentdetils->date=date('y-m-d',strtotime($request->date));
        $paymentdetils->updated_by=Auth::user()->id;
        $paymentdetils->save();
        return redirect()->back();



        

      }
    }


    public function credit_detils ($invoice_id){

      
      $payment=payment::where('invoice_id',$invoice_id)->first();
      //return $payment;
      return view('backend.customer.credit_detils',compact('payment'));
    }


    public function paid_customer(){

    $paid=payment::where('due','0')->get(); 

    //dd($paid);

    return view('backend.customer.paid_customer',compact('paid'));
    }
}
