@extends('backend.layouts.master')

@section('content')

                <!-- content HEADER -->
                <!-- ========================================================= -->

                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">customer</a></li>
                            <li><a href="javascript:avoid(0)">Add-customer</a></li>
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
                                        <div class="col-xs-6"><h4 class="text-primary">Daily Invoice Report</h4></div>
                                        <div class="col-xs-6 text-right">
                                           <a class="btn btn-primary " href="">Manage customer</a> 

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="get" action="{{route('invoice.daily.report.store')}}" enctype="multipart/form-data">
                                               

                                                <div class="form-group">
                                                    <label for="customer" class="col-sm-3 control-label">Start date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="start"  placeholder="Enter start date">
                                                    </div>
                                                </div>
                                                   <div class="form-group">
                                                    <label for="customer" class="col-sm-3 control-label">End Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="end" id="end" placeholder="Enter end date" >
                                                    </div>
                                                </div>

                                                 
                                                   

                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9 ">
                                                        <button type="submit" class="btn btn-primary ">Show invoice report</button>
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
