@extends('backend.layouts.master')

@section('content')

<!-- content HEADER -->
    <!-- leftside content header -->
    <div class="leftside-content-header">
<!-- ========================================================= -->
<div class="content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">product</a></li>
            <li><a href="javascript:avoid(0)">Manage-product</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">


 <div class="row"> 

    <div class="col-sm-12 col-md-8 col-md-offset-2">
     @include('backend.error_message')
     <div class="panel b-primary bt-md">
        <div class="panel-content">
            <div class="row">
                <div class="col-xs-6">
                    <h4 class="text-success">Select Your Citeria</h4>
                </div>
                <div class="col-xs-6 text-right">
                   <a class="btn btn-primary " href="{{route('product.create')}}">Add product</a> 

               </div>
           </div>
           <div class="row ">
            <div class="col-md-12">
              <div class="input-group">
                           <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="radio" class="custom-control-input" name="stock_report" value="supplier" id="speprice3" >
                              <label class="custom-control-label" for="speprice3">Supplier</label>
                            
                           </div>
                </div>

                <div class="input-group">
                           <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="radio" class="custom-control-input" name="stock_report" value="product" id="speprice3" >
                              <label class="custom-control-label" for="speprice3">Product</label>
                            
                           </div>
                </div>

                <form method="get" action="{{route('stock.supplier.report')}}">

                  <div class="form-group">
                          <label for="product" class="col-sm-3 control-label">search supplier product </label>
                          <div class="col-sm-9">
                          <select class="form-control" name="supplier_id">
                            <option>Select Supplier Name</option>
                            @foreach($supplier as $supplier)

                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>

                            @endforeach
                          </select>
                          <input type="submit" value="search" class="btn btn-primary" >
                          </div>
                  </div>



                </form>

<!-- 
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                <th>catagory Name</th>
                                <th>supplier Name</th>
                                <th>unit Name</th>
                                <th>product Name</th>
                                <th>quantity</th>
                                
                               
                            </tr>
                        </thead>
                        <tbody>

                       
                               
                                  </tbody>
                              </table>
                          </div> -->
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

