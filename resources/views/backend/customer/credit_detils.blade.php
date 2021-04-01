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
                    <h4 class="text-success">Credid-Detils customer</h4>
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

                              <h3 class="text-center text-primary">Customer Credit Detils</h3>

                             


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

                                  <tr>
                                    <td colspan="6" class="text-center text-primary text-lg">Payment Summary</td>
                                  </tr>

                               @php
                               
                              
                               $paymentdetils=App\paymentdetils::where('invoice_id',$payment->invoice_id)->get();
                               @endphp

                               <tr>
                                 <td colspan="3">Date</td>
                                 <td colspan="3">Paid Amount</td>
                               </tr>

                               @foreach($paymentdetils as $key=>$detils)
                                  <tr>
                                    <td colspan="3">{{$detils->date}}</td>
                                    <td colspan="3">{{$detils->current_paid}} TK</td>
                                  
                                  </tr>
                               @endforeach
                                  
                                </tbody>
                              </table>
                                                
                        </div>
                      </div>
                  </div>
              </div>
          </div>


           <!-- FULL CIRCLE LOADER  -->
    
 

      </div>



      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      @endsection

