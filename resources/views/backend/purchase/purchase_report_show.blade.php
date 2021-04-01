@extends('backend.layouts.master')

@section('content')

<!-- content HEADER -->
    <!-- leftside content header -->
    <div class="leftside-content-header">
<!-- ========================================================= -->
<div class="content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">purchase</a></li>
            <li><a href="javascript:avoid(0)">Daily-purchase-Report</a></li>
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
                    <h4 class="text-success">Daily-purchase-Report</h4>
                </div>
                <div class="col-xs-6 text-right">
                   <a class="btn btn-primary " href="{{route('purchase.report')}}">Search Again</a> 

               </div>
           </div>
           <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                  <span class="btn btn-primary">Date: {{$s_date}}</span ><span class="btn btn-danger">To</span><span class="btn btn-success"> &nbsp &nbsp {{$e_date}}</span>
                    <table id="basic-table" class="data-table table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                
                                <th>Purchase NO</th>
                                <th>Supplier Name</th>
                                <th>Catagory Name</th>
                                <th>Product Name</th>
                          
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Buying Price</th>
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                          @php
                          $total=0;
                          @endphp

                            @foreach($purchase as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                 
                                <td>{{$row->purchase_no}}</td>    
                                <td>{{$row->supplier->name}}</td>
                                <td>{{$row->catagory->name}}</td>
                                <td>{{$row->product->name}}</td>
                                
                                <td>
                                  {{$row->buying_qty}}
                                  {{$row->product->unit->name}}

                                </td>
                                <td>{{$row->unit_price}}</td>
                                <td>{{$row->buying_price}}</td>
                                
                             
                                </tr>
                                @php
                                $total+=$row->buying_price
                                @endphp
                              

                                      @endforeach

                                        <tr>
                                  <td colspan="7" class="text-right text-primary">SubTotal</td>
                                  <td>{{$total}}</td>
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

 <!-- sweet alert -->
    <script src="{{asset('/')}}assets/admin/sweet_alert/sweet_alert.js"></script>

   

      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      @endsection

