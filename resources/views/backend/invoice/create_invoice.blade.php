@extends('backend.layouts.master')

@section('content')

                <!-- content HEADER -->
                <!-- ========================================================= -->

                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">invoice</a></li>
                            <li><a href="javascript:avoid(0)">Add-invoice</a></li>
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
                                        <div class="col-xs-6"><h4 class="text-primary">invoice Add Form</h4></div>
                                        <div class="col-xs-6 text-right">
                                           <a class="btn btn-primary " href="{{route('invoice.manage')}}">Manage invoice</a> 

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">

                                             <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">invoice no</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="invoice_no" id="invoice_no" value="{{$invoice_no}}" readonly>
                                                    </div>
                                                </div>
        
                                                <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="date" name="date" value="{{$date}}">
                                                    </div>
                                                </div>
                                                 

                                                  <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">catagory name</label>
                                                    <div class="col-sm-9">

                                                       <select class="form-control" id="cat_id" name="cat_id">
                                                        <option value="">select catagory</option>
                                                        @foreach($catagory as $catagory)
                                                           <option value="{{$catagory->id}}">{{$catagory->name}}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                </div>


                                                 

                                                   <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">product name</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" id="product_id" name="product_id">
                                                           <option value="">select product</option>
                                                    
                                                           <option value=""></option>
                                                         
                                                       </select>
                                                    </div>
                                                  </div>

                                               

                                               

                                                <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">Avaible Stock(PCS/KG)</label>
                                                    <div class="col-sm-9">
                                                      <input type="number" class="form-control" id="current_qty" name="current_qty" readonly>
                                                    </div>
                                                </div>
                                              


                                               
                                                  

                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-offset-3 col-sm-9 mt-4">
                                                        <a class="btn btn-primary addmore" id="addmore"><i class="fa fa-plus">Add Item</i></a>
                                                      
                                                    </div>
                                                </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <form class="form-horizontal" method="post" action="{{route('invoice.store')}}" enctype="multipart/form-data">
                    @csrf

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>catagory</th>
                                <th>product name</th>
                                <th>pcs</th>
                                <th>unit price</th>
                                
                            
                                <th>Total price price</th>
                                
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id="addrow" class="addrow">
                            
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="4">Discount</td>
                                <td><input type="text" class="form-control" id="discount" name="discount" placeholder="Discount" ></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    SubTotal
                                </td>
                            
                                <td colspan="">
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" id="estimate" name="estimate" placeholder="Total" value="" readonly="">
                                </div>
                               </td>
                               <td></td>
                            </tr>
                        </tbody>
                    </table>

                                              <div class="form-group">
                                                    <label for="invoice" class="col-md-2 control-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="number" class="form-control" id="description" name="description" placeholder="Add invoice quantity"></textarea>
                                                    </div>
                                                </div>



                                                   <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">paid status</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" id="paid_status" name="paid_status">
                                                           <option value="">select status</option>
                                                    
                                                           <option value="full_paid">Full Paid</option>
                                                           <option value="full_due">Full due</option>
                                                           <option value="partial_paid">Partial Paid</option>
                                                         
                                                       </select>
                                                    </div>
                                                  </div>
                                                <div class="col-sm-12 col-md-8 col-md-offset-2 " >
                                                <div class="form-group paid_amount " style="display:none" >
                                                 <label for="invoice" class="col-sm-3 control-label ">partial paid amount</label>
                                                 <div class="col-sm-9">
                                                <input type="text" class="form-control" name="paid" placeholder="Enter partial amount" atyle="display:none;">
                                                
                                                </div>
                                                </div>
                                                </div>
                                                  
                                                 <div class="form-group">
                                                    <label for="invoice" class="col-sm-3 control-label">Select customer</label>
                                                    <div class="col-sm-9">

                                                       <select class="form-control" id="customer_id" name="customer_id">
                                                        <option value="">select customer</option>
                                                        @foreach($customer as $customer)
                                                           <option value="{{$customer->id}}"> {{$customer->name}} ({{$customer->mobile}})</option>
                                                           @endforeach
                                                           <option value="0">New customer</option>
                                                       </select>
                                                    </div>
                                                </div>

                                             <div class="row"> 

                                             <div class="col-sm-12 col-md-8 col-md-offset-2 new_customer" style="display: none;">
                                                <div class="form-group">
                                                 <label for="invoice" class="col-sm-3 control-label">Customer Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter amount" atyle="display:none;">
                                                
                                                </div>
                                                 <div class="form-group">
                                                 <label for="invoice" class="col-md-3 control-label">Customer Mobile</label>
                                                <input type="text" class="form-control"  name="mobile" placeholder="Enter customer mobile" atyle="display:none;">
                                                
                                                </div>
                                                 <div class="form-group">
                                                 <label for="invoice" class="col-sm-3 control-label">Customer Addres</label>
                                                <input type="text" class="form-control" name="address" placeholder="Enter customer address" atyle="display:none;">
                                                
                                                </div>
                                                </div>
                                                  
                                              </div>

                                                
                                                        <button class="btn btn-primary" id="storebutton">Save invoice</button>
                                                      
                                                    
                                                </div>

                   </form>

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>            

   <script id="document-template" type="text/x-handlebars-template">
       
      <tr id="delete-add-more-item" class="delete-add-more-item">
        
            <input type="hidden" name="date" value="@{{date}}">
            <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
            

        <td>
             <input type="hidden" name="cat_id[]" value="@{{cat_id}}">   
             @{{catagory_name}} 
        </td>

        <td>
             <input type="hidden" name="product_id[]" value="@{{product_id}}">   
             @{{product_name}} 
        </td>
        <td>
            <input type="number" min='1' name="selling_qty" class="col-sm-3 control-label selling_qty" value="1" >
            
        </td>
        <td>
            <input type="number"  name="unit_price" class="col-sm-3 control-label unit_price" value="" >
        </td>

        

         <td>
             <input type="text"  name="selling_price[]" class="col-sm-3 control-label selling_price " readonly >
        </td>
        <td>
            <i class="btn btn-danger fa fa-close removeeventmore"></i>
        </td>

      </tr> 

   </script>

   <script type="text/javascript" >
    
    $(document).ready(function(){


    $('body').on('click','#addmore',function(){
       //alert('hi')  
     var date=$('#date').val();
     //alert(date);
     var invoice_no=$('#invoice_no').val();
     var supplier_id=$('#supplier_id').val();
     var supplier_name=$('#supplier_id').find('option:selected').text();
     //alert(supplier_name);
     var cat_id=$('#cat_id').val();
     //alert(cat_id);
     var catagory_name=$('#cat_id').find('option:selected').text();
     //alert(catagory_name);
     var product_id=$('#product_id').val();
     var product_name=$('#product_id').find('option:selected').text();
    
     //alert(product_name)
     var source=$("#document-template").html();
     //alert(source)
     var template=Handlebars.compile(source);
     var data={
        date:date,
        invoice_no:invoice_no,
        supplier_id:supplier_id,
        supplier_name:supplier_name,
        cat_id:cat_id,
        catagory_name:catagory_name,
        product_id:product_id,
        product_name:product_name,
      
        
     };
     var html=template(data);
     //alert(html)
     $('#addrow').append(html);

    });

    $(document).on("click",".removeeventmore",function(event){
        $(this).closest(".delete-add-more-item").remove();
        totalAmountPrice();
    });

   
/**************************code for total amount *****************************/
    
     $(document).on("keyup click",'.unit_price,.selling_qty',function(){
        var unit_price=$(this).closest("tr").find("input.unit_price").val();
        var qty=$(this).closest("tr").find("input.selling_qty").val();
        //alert(qty);
        var total=unit_price*qty;
        //alert(total);
        $(this).closest("tr").find("input.selling_price").val(total);
        $('#discount').trigger('keyup');
    });


/**************************code for total discount amount *****************************/
    

     $(document).on("keyup ",'#discount',function(){
        totalAmountPrice()

      });


    function totalAmountPrice(){
        var sum=0;
        $('.selling_price').each(function(){
            var value=$(this).val();
            if(!isNaN(value) && value.length !=0){
                sum +=parseFloat(value);
            }


        });

        var discount=parseFloat($('#discount').val());
        if(!isNaN(discount) && discount.length !=0){
                sum -=parseFloat(discount);
            }
        $('#estimate').val(sum);
    
    }

 });




     
</script>


<!------------------------- cose for show product when select catagory --------------------->

<script type="text/javascript">
      let token2=$('#_token').val();
      //alert(token2)
      $('body').on('change','#cat_id',function(){
     let cat_id=$(this).val();
      //alert(cat_id);
       //console.log(cat_id);
     $.ajax({ 
        method:'post',
        url:'/show/product',
        data:{_token:token2, cat_id:cat_id},
        success:function(result){
         $('#product_id').html(result);
         //console.log(result)
        }
     })

    }) 
</script>


<!------------------------- cose for show current avabile product --------------------->

<script type="text/javascript">
      
      $('body').on('change','#product_id',function(){
     let product_id=$(this).val();
      //alert(product_id);
       //console.log(product_id);
     $.ajax({ 
        method:'get',
        url:'/current/product',
        data:{ product_id:product_id},
        success:function(result){
         $('#current_qty').val(result);
         //console.log(result)
        }
     })

    }) 
</script>






<script type="text/javascript">
      
      $('body').on('change','#paid_status',function(){
      let paid_status=$(this).val();
      //alert(paid_status);
      if(paid_status=='partial_paid'){
        $('.paid_amount').show();
      }else{
        $('.paid_amount').hide();
      }
    

    }) 
</script>

<!------------------------- cose for show new customr --------------------->

<script type="text/javascript">
      
      $('body').on('change','#customer_id',function(){
      let customer_id=$(this).val();
      //alert(paid_status);
      if(customer_id=='0'){
        $('.new_customer').show();
      }else{
        $('.new_customer').hide();
      }
    

    }) 
</script>


@endsection

