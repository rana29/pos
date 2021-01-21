       @include('backend.layouts.header')
        <!-- page BODY -->
        <!-- ========================================================= -->
       @include('backend.layouts.sidebar')
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
            

                @yield('content')


            </div>
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    @include('backend.layouts.footer')
    <!--BASIC scripts-->
  