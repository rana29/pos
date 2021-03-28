@extends('backend.layouts.master')

@section('content')

<!-- content HEADER -->
    <!-- leftside content header -->
    <div class="leftside-content-header">
<!-- ========================================================= -->
<div class="content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">invoice</a></li>
            <li><a href="javascript:avoid(0)">pending-invoice</a></li>
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
                    <h4 class="text-success">pending invoice</h4>
                </div>
               
           </div>
           <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Invoice no</th>
                                <th>Date</th>
                              
                                <th>Description</th>
                                <th>Total</th>
                                <th>Status</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          @foreach($invoice as $key=>$invoice)  
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$invoice->payment->customer->name}}</td>
                                <td>{{$invoice->payment->customer->mobile}}</td>
                                <td>{{$invoice->payment->customer->address}}</td>
                                <td>{{$invoice->invoice_no}}</td>
                                <td>{{date('d-m-y',strtotime($invoice->date))}}</td>
                                <td>{{$invoice->description}}</td>
                                <td>{{$invoice->payment->total}}</td>                                  
                                 <td>@if($invoice->status=='0')
                                  <span class="btn btn-danger ">Pending</span>
                                  @elseif($invoice->status=='1')
                                  <span class="btn btn-primary">Approved</span>
                                  @endif
                                </td>

                                <td>              
                                   
                                  @if($invoice->status=='0')
                                      <a href="{{route('invoice.pending.approved',$invoice->id)}}" id="approved" class="btn btn-success btn-xs "><i class="fa fa-check-circle"></i></a>
                                      @endif
                                       <a href="{{route('invoice.delete',$invoice->id)}}" id="delete" class="btn btn-success btn-xs "><i class="fa fa-trash"></i></a>
                                </td>                                  
                            
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
    
    <div>
    
    <div>
    <div class="ml-loader  circle">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  </div>

      </div>

 <!-- sweet alert -->
    <script src="{{asset('/')}}assets/admin/sweet_alert/sweet_alert.js"></script>

    <script type="text/javascript">
       $(document).on('click','#approved',function(e){
          //alert('hell');
   e.preventDefault();
   var link=$(this).attr("href");
     //alert(link);

    Swal.fire({
  title: 'Are you sure to approved?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, approved it!'
}).then((result) => {
  if (result.value) {
    window.location.href=link;
    Swal.fire(
      'approvedd!',
      'Your file has been approvedd.',
      'success'
    )
  }
})
});
    </script>

      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      @endsection

