@extends('backend.layouts.master')

@section('content')

<!-- content HEADER -->
    <!-- leftside content header -->
    <div class="leftside-content-header">
<!-- ========================================================= -->
<div class="content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">customer</a></li>
            <li><a href="javascript:avoid(0)">Credid-Edit-customer</a></li>
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
                    <h4 class="text-success">Credid-Edit customer</h4>
                </div>
                <div class="col-xs-6 text-right">
                   <a class="btn btn-primary " href="{{route('customer.create')}}">Add customer</a> 

               </div>
           </div>
           <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="" class="data- table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            
                                <th>customer Name</th>
                                <th>MOBILE</th>
                                <th>ADDRESS</th>
                                
                                
                               
                            </tr>
                        </thead>
                       <tbody>

                           
                            <tr>
                                
                                <td>{{$payment->customer->name}}</td>
                                <td>{{$payment->customer->mobile}}</td>
                                <td>{{$payment->customer->address}}</td>
                               
                              
                               
                                
                         
                                  </tbody>
                              </table>

                              <h3 class="text-center text-primary">Customer invoice Detils</h3>

                              <form method="post" action="{{route('customer.credit.update',$payment->invoice_id)}}">
                                @csrf


                              <table table id="" class=" table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>SI</th>
                                    <th>Catagory</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total </th>
                                    
                                  </tr>
                                </thead>
                                <tbody>

                               @php
                               $total_price=0;
                              
                               $invoicedetils=App\invoicedetils::where('invoice_id',$payment->invoice_id)->get();
                               @endphp

                               @foreach($invoicedetils as $key=>$detils)

                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$detils->catagory->name}}</td>
                                    <td>{{$detils->product->name}}</td>
                                    <td>{{$detils->unit_price}}</td>
                                    <td>{{$detils->selling_qty}}</td>
                                    <td>{{$detils->selling_price}} TK</td>
                                    
                                  
                                  </tr>

                                  @php
                                  $total_price+=$detils->selling_price;
                                  @endphp
                                  @endforeach
                                  <tr>
                                    <td colspan="5" class="text-right">Subtotal</td>
                                    <td>{{$total_price}} TK</td>
                                  </tr>

                                   <tr>
                                    <td colspan="5" class="text-right">Discount</td>
                                    <td>{{$payment->discount}}TK</td>
                                  </tr>

                                  <tr>
                                    <td colspan="5" class="text-right">Total After Discount</td>
                                    <td>{{$total_price-$payment->discount}}TK</td>
                                  </tr>

                                   <tr>
                                    <td colspan="5" class="text-right">Paid Amount</td>
                                    <td>{{$payment->paid}} TK</td>
                                  </tr>

                                   <tr>
                                    <td colspan="5" class="text-right">Due Amount</td>
                                    <input type="hidden" name="new_paid" value="{{$payment->due}}">
                                    <td>{{$payment->due}}TK</td>
                                  </tr>

                                  
                                </tbody>
                              </table>


                                                    <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">paid status</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" id="paid_status" name="paid_status">
                                                           <option value="">select status</option>
                                                    
                                                           <option value="full_paid">Full Paid</option>
                                                           
                                                           <option value="partial_paid">Partial Paid</option>
                                                         
                                                       </select>
                                                    </div>
                                                  </div>


                                               <div class="paid_amount" style="display:none" >
                                                
                                                <div class="form-group  " >
                                                 <label for="invoice" class="col-sm-3 control-label ">partial paid amount</label>
                                                 <div class="col-sm-9">
                                                <input type="text"  name="paid" placeholder="Enter partial amount" padding="10px">
                                                
                                                </div>
                                                </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="customer" class="col-sm-3  control-label">Date</label><br>
                                                    <div class="col-sm-9 ">
                                                        <input type="date" class="form-control" name="date"  placeholder="Enter  date">
                                                    </div>
                                                </div><br>


                                                <div class="form-group">
                                                   <button type="submit" class="btn btn-primary">Update Invoive</button>
                                                </div>
                                                </div>

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

    <script type="text/javascript">
      
      $('body').on('change','#paid_status',function(){
      let paid_status=$(this).val();
      //alert(paid_status);
      if(paid_status=='partial_paid'){
        $('.paid_amount').show();
      }else{
        $('.paid_amount').hide();
      }
    

    }) 
</script>

      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      @endsection

