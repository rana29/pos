@extends('backend.layouts.master')

@section('content')

                <!-- content HEADER -->
                <!-- ========================================================= -->

                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Supplier</a></li>
                            <li><a href="javascript:avoid(0)">Add-Supplier</a></li>
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
                                        <div class="col-xs-6"><h4 class="text-primary">Supplier Add Form</h4></div>
                                        <div class="col-xs-6 text-right">
                                           <a class="btn btn-primary " href="{{route('supplier.manage')}}">Manage supplier</a> 

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="{{route('supplier.store')}}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="supplier" class="col-sm-3 control-label">supplier name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name" id="supplier" placeholder="Add supplier name" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                                   <div class="form-group">
                                                    <label for="supplier" class="col-sm-3 control-label">Supplier Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="address" id="supplier" placeholder="Add supplier address" value="{{old('name')}}">
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label for="supplier" class="col-sm-3 control-label">Supplier Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="mobile" id="supplier" placeholder="Add supplier number" value="{{old('number')}}">
                                                    </div>
                                                  </div>
                                                     <div class="form-group">
                                                    <label for="supplier" class="col-sm-3 control-label">supplier Image</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" name="image" id="supplier" placeholder="Add supplier">
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9 ">
                                                        <button type="submit" class="btn btn-primary ">Save supplier</button>
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
