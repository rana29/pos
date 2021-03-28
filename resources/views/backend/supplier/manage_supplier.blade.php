@extends('backend.layouts.master')

@section('content')

<!-- content HEADER -->
    <!-- leftside content header -->
    <div class="leftside-content-header">
<!-- ========================================================= -->
<div class="content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Supplier</a></li>
            <li><a href="javascript:avoid(0)">Manage-supplier</a></li>
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
                    <h4 class="text-success">Manage supplier</h4>
                </div>
                <div class="col-xs-6 text-right">
                   <a class="btn btn-primary " href="{{route('supplier.create')}}">Add supplier</a> 

               </div>
           </div>
           <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                <th>supplier Name</th>
                                <th>MOBILE</th>
                                <th>ADDRESS</th>
                                <th>IMAGE</th>
                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($supplier as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>{{$row->address}}</td>
                                <td><img src="{{ asset('supplier/'.$row->image)}}" style="width:60px; height:50px"></td>
                               
                                
                                
                                <td> <input type="checkbox"  data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="small" data-onstyle="primary" data-offstyle="danger" 
                                  id="status" data-id="{{$row->id}}" {{$row->status==1? 'checked':''}}> </td>

                                @php
                                $count=App\product::where('supplier_id',$row->supplier_id)->count();
                                @endphp  
                                
                                <td>              
                                    <a href="{{route('supplier.edit',$row->id)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                                    @if($count<1)

                                      <a href="{{route('supplier.delete',$row->id)}}" id="delete" class="btn btn-success btn-xs "><i class="fa fa-trash"></i></a>
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

