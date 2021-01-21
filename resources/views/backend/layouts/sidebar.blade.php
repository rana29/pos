 @php
 $prefix=Request::route()->getPrefix();
 $route=Route::current()->getName();
 @endphp
 <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Admin-Dashbord</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="{{request()->is('dashbord')? 'active-item':''}}"><a href=""><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>


                                 <li class="has-child-item close-item {{($prefix=='/supplier')?'open-item':''}}">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Supplier</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="{{route('supplier.create')}}" class="{{($route=='supplier.create')? 'active-item':''}}">Add supplier</a></li>

                                        <li class=""><a href="{{route('supplier.manage')}}" class="{{($route=='supplier.manage')? 'active-item':''}}">View supplier</a></li>
                                    </ul>
                                </li>



                                 <li class="has-child-item close-item {{($prefix=='/customer')?'open-item':''}}">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>customer</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="{{route('customer.create')}}" class="{{($route=='customer.create')? 'active-item':''}}">Add customer</a></li>

                                        <li class=""><a href="{{route('customer.manage')}}" class="{{($route=='customer.manage')? 'active-item':''}}">View customer</a></li>
                                    </ul>
                                </li>


                                 <li class="has-child-item close-item {{($prefix=='/unit')?'open-item':''}}">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>unit</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="{{route('unit.create')}}" class="{{($route=='unit.create')? 'active-item':''}}">Add unit</a></li>

                                        <li class=""><a href="{{route('unit.manage')}}" class="{{($route=='unit.manage')? 'active-item':''}}">View unit</a></li>
                                    </ul>
                                </li>


                                 <li class="has-child-item close-item {{($prefix=='/catagory')?'open-item':''}}">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>catagory</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="{{route('catagory.create')}}" class="{{($route=='catagory.create')? 'active-item':''}}">Add catagory</a></li>

                                        <li class=""><a href="{{route('catagory.manage')}}" class="{{($route=='catagory.manage')? 'active-item':''}}">View catagory</a></li>
                                    </ul>
                                </li>


                               <li class="has-child-item close-item {{($prefix=='/product')?'open-item':''}}">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>product</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="{{route('product.create')}}" class="{{($route=='product.create')? 'active-item':''}}">Add product</a></li>

                                        <li class=""><a href="{{route('product.manage')}}" class="{{($route=='product.manage')? 'active-item':''}}">View product</a></li>
                                    </ul>
                                </li>


                                 <li class="has-child-item close-item {{($prefix=='/purchase')?'open-item':''}}">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>purchase</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="{{route('purchase.create')}}" class="{{($route=='purchase.create')? 'active-item':''}}">Add purchase</a></li>

                                        <li class=""><a href="{{route('purchase.manage')}}" class="{{($route=='purchase.manage')? 'active-item':''}}">View purchase</a></li>
                                    </ul>
                                </li>



                              

                              
                                

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>