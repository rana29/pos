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
            <li><a href="javascript:avoid(0)">Credit-customer</a></li>
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
                    <h4 class="text-success">Credit customer</h4>
                </div>
                <div class="col-xs-6 text-right">
                   <a class="btn btn-primary " href="{{route('customer.create')}}">Add customer</a> 

               </div>
           </div>
           <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                <th>customer Name</th>
                                <th>MOBILE</th>
                                <th>ADDRESS</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>payment Due</th>
                                
                                
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                @php
                                $total='0';
                                @endphp

                            @foreach($payment as $key=>$payment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$payment->customer->name}}</td>
                                <td>{{$payment->customer->mobile}}</td>
                                <td>{{$payment->customer->address}}</td>
                                <td>#{{$payment->invoice->invoice_no}}</td>
                                <td>{{$payment->invoice->date}}</td>
                                <td>{{$payment->total}}</td>
                                <td>{{$payment->paid}}</td>
                                <td>{{$payment->due}}</td>
                              
                               
                                
                                
                               

                                <td>              
                                    <a href="{{route('customer.credit.edit',$payment->invoice_id)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>

                                      <a href="{{route('customer.credit.detils',$payment->invoice_id)}}" id="delete" class="btn btn-primary btn-xs "><i class="fa fa-eye"></i></a>
                                </td>


                                </tr>
                                @php
                                $total+=$payment->due
                                @endphp

                                      @endforeach

                                    <tr>
                                  <td colspan="8" class="text-right text-primary">SubTotal Due</td>
                                  <td colspan="3">{{$total}} TK</td>
                                </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


           <!-- FULL CIRCLE LOADER  -->
    
   
      </div>

 <

      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      @endsection

