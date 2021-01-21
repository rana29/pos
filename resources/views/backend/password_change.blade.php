@extends('backend.layouts.master')

@section('content')

                <!-- content HEADER -->
                <!-- ========================================================= -->
               <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Password</a></li>
                            <li><a href="javascript:avoid(0)">Change password</a></li>
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
                                        <div class="col-xs-6"><h4 class="text-success">User password change</h4></div>
                                        <div class="col-xs-6 text-right">
                                           <a class="btn btn-primary " href="">your profile</a> 

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-8 col-md-offset-2">
                                            <form class="form-horizontal" method="post" action="{{route('update.password')}}">
                                                @csrf

                                               
                                                <div class="form-group">
                                                    <label for="email2" class="col-sm-3 control-label">Old passord</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="old" id="email2" placeholder="old password" value="{{old('password')}}">
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="email2" class="col-sm-3 control-label">New password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="new" id="email2" placeholder="New password" value="{{old('email')}}">
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="email2" class="col-sm-3 control-label">Confarm password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="confarm" id="email2" placeholder=" confarm password" value="{{old('email')}}">
                                                    </div>
                                                </div>

                                               

                                               
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9 ">
                                                        <button type="submit" class="btn btn-primary ">Update password</button>
                                                    </div>
                                                </div>


                                              
                                            </form>
                                        </div>

                    </div>
               
              
@endsection