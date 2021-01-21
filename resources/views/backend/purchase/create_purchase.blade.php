@extends('backend.layouts.master')

@section('content')

                <!-- content HEADER -->
                <!-- ========================================================= -->

                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">purchase</a></li>
                            <li><a href="javascript:avoid(0)">Add-purchase</a></li>
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
                                        <div class="col-xs-6"><h4 class="text-primary">purchase Add Form</h4></div>
                                        <div class="col-xs-6 text-right">
                                           <a class="btn btn-primary " href="{{route('purchase.manage')}}">Manage purchase</a> 

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
        
                                                <div class="form-group">
                                                    <label for="purchase" class="col-sm-3 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="date" name="date" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                                  <div class="form-group">
                                                    <label for="purchase" class="col-sm-3 control-label">purchase no</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="purchase_no" id="purchase_no" value="{{old('name')}}">
                                                    </div>
                                                </div>

                                                  <div class="form-group">
                                                    <label for="purchase" class="col-sm-3 control-label">supplier name</label>
                                                    <div class="col-sm-9">

                                                       <select class="form-control" id="supplier_id" name="supplier_id">
                                                        <option value="">select supplier</option>
                                                        @foreach($supplier as $supplier)
                                                           <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                </div>


                                                  <div class="form-group">
                                                    <label for="purchase" class="col-sm-3 control-label">catagory name</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" id="cat_id" name="cat_id">
                                                           <option value="">select catagory</option>
                                                    
                                                           <option value=""></option>
                                                         
                                                       </select>
                                                    </div>
                                                  </div>

                                                   <div class="form-group">
                                                    <label for="purchase" class="col-sm-3 control-label">product name</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" id="product_id" name="product_id">
                                                           <option value="">select product</option>
                                                    
                                                           <option value=""></option>
                                                         
                                                       </select>
                                                    </div>
                                                  </div>

                                               

                                               

                                                <div class="form-group">
                                                    <label for="purchase" class="col-sm-3 control-label">unit name</label>
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
                                                    <label for="purchase" class="col-sm-3 control-label">purchase quantity</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="quantity" placeholder="Add purchase quantity" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                                  

                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9 ">
                                                        <a class="btn btn-primary addmore" id="addmore"><i class="fa fa-plus">Add Item</i></a>
                                                      
                                                    </div>
                                                </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <form class="form-horizontal" method="post" action="{{route('purchase.store')}}" enctype="multipart/form-data">
                    @csrf

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>catagory</th>
                                <th>product name</th>
                                <th>pcs</th>
                                <th>unit price</th>
                                <th>description</th>
                                <th>total price price</th>
                                
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id="addrow" class="addrow">
                            
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="5"></td>
                                <td>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" id="estimate" name="estimate" id="" placeholder="Total" value="0" readonly="">
                                </div>
                               </td>
                               <td></td>
                            </tr>
                        </tbody>
                    </table>
                   </form>

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

   <script id="template" type="text/x-handlebars-template">
      <tr id="delete-add-more-item" class="delete-add-more-item">
        
            <input type="hidden" name="date[]" value="@{{date}}">
            <input type="hidden" name="puchase_no[]" value="@{{purchase_no}}">
            <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">

        <td>
             <input type="hidden" name="cat_id[]" value="@{{cat_id}}">   
            @{{catagory_name}} 
        </td>
        td>
             <input type="hidden" name="product_id[]" value="@{{product_id}}">   
             @{{product_name}} 
        </td>
        <td>
            <input type="number" min='1' name="quantity" class="col-sm-3 control-label quantity" value="1" >
        </td>
        <td>
            <input type="number"  name="unit_price" class="col-sm-3 control-label unit_price" value="" >
        </td>
        <td>
             <input type="text"  name="description[]" class="col-sm-3 control-label " value="" >
        </td>

         <td>
             <input type="text"  name="buying_price[]" class="col-sm-3 control-label buying_price " value="0" readonly >
        </td>
        <td>
            <i class="btn btn-danger fa fa-window-close removeeventmore"></i>
        </td>

      </tr> 

   </script>




   <script>

     $('document').ready(function(){
     $('document').on('click','#addmore',function(){ 

      //alert('hi');

     var date=$('#date').val();

     //alert('date');
     var purchase_no=$('#purchase_no').val();
     var supplier_id=$('#supplier_id').val();
     var supplier_name=$('#supplier_id').find('option:selected').text();
     var catagory_id=$('#cat_id').val();
     var catagory_name=$('#cat_id').find('option:selected').text();
     var product_id=$('#product_id').val();
     var product_name=$('#product_id').find('option:selected').text();

     var source=('#template').html();
     var template=Handlebars.compile(source);
     var data={
        date:date,
        purchase_no:purchase_no,
        supplier_id:supplier_id,
        supplier_name:supplier_name,
        catagory_id:catagory_id,
        catagory_name:catagory_name,
        product_id:product_id,
        product_name:product_name,
        
     };
     var html=template(data);
     $('#addrow').append(html);

     }); 
     }); 

   </script>





 <script >
    let token=$('#_token').val();
    //alert(token)

    $('body').on('change','#supplier_id',function(){
    let supplier_id=$(this).val();
     //console.log(supplier_id);
     $.ajax({ 
        method:'post',
        url:'{{route('show.catagory')}}',
        data:{_token:token, supplier_id:supplier_id},
        success:function(result){
         $('#cat_id').html(result);
         //console.log(result)
        }
     })

    })
</script>

<script type="text/javascript">
      let token2=$('#_token').val();
      //alert(token2)
      $('body').on('change','#cat_id',function(){
     let cat_id=$(this).val();
     //console.log(cat_id);
     $.ajax({ 
        method:'post',
        url:'{{route('show.product')}}',
        data:{_token:token2, cat_id:cat_id},
        success:function(result){
         $('#product_id').html(result);
         //console.log(result)
        }
     })

    }) 
</script>


@endsection

