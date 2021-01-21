
 $(document).ready(function(){



      
  $(document).on('change','#payment',function(){
    var payment==$this.val();
    if(payment=='Bkash'){
        $('.show').show();
    }
    else{
        $('.show').hide();
    }

});




    });