@extends('backend.layouts.master')

@section('content')

                <!-- content HEADER -->
                <!-- ========================================================= -->

                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">product</a></li>
                            <li><a href="javascript:avoid(0)">Add-product</a></li>
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
                                        <div class="col-xs-6"><h4 class="text-primary">product Add Form</h4></div>
                                        <div class="col-xs-6 text-right">
                                           <a class="btn btn-primary " href="{{route('product.manage')}}">Manage product</a> 

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="product" class="col-sm-3 control-label">product name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name" id="product" placeholder="Add product name" value="{{old('name')}}">
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="product" class="col-sm-3 control-label">supplier name</label>
                                                    <div class="col-sm-9">

                                                       <select class="form-control" name="supplier_id">
                                                        <option value="">select supplier</option>
                                                        @foreach($supplier as $supplier)
                                                           <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="product" class="col-sm-3 control-label">unit name</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" name="unit_id">
                                                           <option value="">select unit</option>

                                                           @foreach($unit as $unit)
                                                           <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="product" class="col-sm-3 control-label">catagory name</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" name="cat_id">
                                                           <option value="">select catagory</option>
                                                           @foreach($catagory as $catagory)
                                                           <option value="{{$catagory->id}}">{{$catagory->name}}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="product" class="col-sm-3 control-label">product quantity</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="quantity" id="product" placeholder="Add product quantity" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                                  

                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9 ">
                                                        <button type="submit" class="btn btn-primary ">Save product</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
@endsection
