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
            <li><a href="javascript:avoid(0)">Manage-purchase</a></li>
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
                    <h4 class="text-success">Manage purchase</h4>
                </div>
                <div class="col-xs-6 text-right">
                   <a class="btn btn-primary " href="{{route('purchase.create')}}">Add purchase</a> 

               </div>
           </div>
           <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                <th>Purchase Date</th>
                                <th>Purchase NO</th>
                                <th>Supplier Name</th>
                                <th>Catagory Name</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Buying Price</th>
                                <th>Status</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($purchase as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                 <td>{{date('d-m-y',strtotime($row->date))}}</td>
                                <td>{{$row->purchase_no}}</td>    
                                <td>{{$row->supplier->name}}</td>
                                <td>{{$row->catagory->name}}</td>
                                <td>{{$row->product->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                  {{$row->buying_qty}}
                                  {{$row->product->unit->name}}

                                </td>
                                <td>{{$row->unit_price}}</td>
                                <td>{{$row->buying_price}}</td>
                                <td>@if($row->status=='0')
                                  <span class="btn btn-danger ">Pending</span>
                                  @elseif($row->status=='1')
                                  <span class="btn btn-primary">Approved</span>
                                  @endif
                                </td>
                             
                               
                                            

                                <td>              
                                   
                                  @if($row->status=='0')
                                      <a href="{{route('purchase.delete',$row->id)}}" id="delete" class="btn btn-success btn-xs "><i class="fa fa-trash"></i></a>
                                      @endif
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
       $(document).on('click','#delete',function(e){
          //alert('hell');
   e.preventDefault();
   var link=$(this).attr("href");
     //alert(link);

    Swal.fire({
  title: 'Are you sure to delete?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    window.location.href=link;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
});
    </script>

      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      @endsection

