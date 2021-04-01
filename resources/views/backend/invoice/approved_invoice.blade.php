@extends('backend.layouts.master')

@section('content')

<!-- content HEADER -->
    <!-- leftside content header -->
    <div class="leftside-content-header">
<!-- ========================================================= -->
<div class="content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">invoice</a></li>
            <li><a href="javascript:avoid(0)">Manage-invoice</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">


 <div class="row"> 

    <div class="col-sm-12 col-md-10 col-md-offset-1">
     @include('backend.error_message')
     <div class="panel b-primary bt-md">
        <div class="panel-content">
            <div class="row">
                <div class="col-xs-6">
                    <h4 class="text-success">Customer Detils</h4>
                </div>
                <div class="col-xs-6 text-right">
                   <a class="btn btn-primary " href="{{route('invoice.create')}}">Add invoice</a> 

               </div>
           </div>
           <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                  @php
                  $payment=App\payment::where('invoice_id',$invoice->id)->first();
                  @endphp
                    <table id="basic-tabl" class=" table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Invoice NO</th>
                                <th>Date</th>
                              
                                                        
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                              
                                <td>{{$invoice->payment->customer->name}}</td>
                                <td>{{$invoice->payment->customer->mobile}}</td>
                                <td>{{$invoice->payment->customer->address}}</td>
                                <td>{{$invoice->invoice_no}}</td>
                                <td>{{date('d-m-y',strtotime($invoice->date))}}</td>
                               </tr>

                         
                                  </tbody>
                              </table>
                              <h3 class="text-center text-success">Product Description</h3>

                              <form method="post" action="{{route('invoice.approved.store',$invoice->id)}}">
                                @csrf

                              <table class=" table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Si</th>
                                  <th>Catagory</th>
                                  <th>Product name</th>
                                  <th>Avaible stock</th>
                                  <th>Quantity</th>
                                  <th>unit price</th>
                                  <th>Total price</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                $total_sum=0;
                                @endphp

                                @foreach($invoice['invoicedetils'] as $key=>$detils)
                                <tr>
                                  <input type="hidden" name="cat_id[]" value="{{$detils->cat_id}}">
                                  <input type="hidden" name="product_id[]" value="{{$detils->product_id}}">
                                  <input type="hidden" name="selling_qty[{{$detils->id}}]" value="{{$detils->selling_qty}}">
                                  <td>{{$key+1}}</td>
                                  <td>{{$detils['catagory']['name']}}</td>
                                  <td>{{$detils['product']['name']}}</td>
                                  <td>{{$detils['product']['quantity']}}</td>
                                  <td>{{$detils['selling_qty']}}</td>
                                  <td>{{$detils['unit_price']}}</td>
                                  <td>{{$detils['selling_price']}} TK</td>
                                 
                                </tr>
                                @php
                                $total_sum +=$detils->selling_price;
                                @endphp

                                @endforeach
                                <tr>
                                  <td colspan="6" class="text-right">Sub Total</td>
                                  <td>{{$total_sum}} TK</td>
                                </tr>

                                <tr>
                                  <td colspan="6" class="text-right">Discount</td>
                                  <td>{{$payment->discount}} TK</td>
                                </tr>
                                 <tr>
                                  <td colspan="6" class="text-right">Current Paid</td>
                                  <td>{{$payment->paid}} TK</td>
                                </tr>
                                 <tr>
                                  <td colspan="6" class="text-right">Due</td>
                                  <td>{{$payment->due}} TK</td>
                                </tr>
                                 <tr>
                                  <td colspan="6" class="text-right">Total</td>
                                  <td>{{$payment->total}} TK</td>
                                </tr>

                              </tbody>


                                
                              </table>
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


           <!-- FULL CIRCLE LOADER  -->
    
    <div>
    
    <div>
    <div class="ml-loader  circle">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  </div>

      </div>

 <!-- sweet alert -->
    <script src="{{asset('/')}}assets/admin/sweet_alert/sweet_alert.js"></script>

    <script type="text/javascript">
       $(document).on('click','#delete',function(e){
          //alert('hell');
   e.preventDefault();
   var link=$(this).attr("href");
     //alert(link);

    Swal.fire({
  title: 'Are you sure to delete?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    window.location.href=link;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
});
    </script>

      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      @endsection

