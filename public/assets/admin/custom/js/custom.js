
$(document).ready(function(){

$('body').on('change','#status',function(){

	   var id=$(this).attr('data-id');
	   //alert(id);

	   if(this.checked){
	   	var status=1;
	   }
	   else{
	   	status=0;
	   }
	   //alert(status);
	   $('.circle').show();

	   $.ajax({
	   	url:'active/'+id+'/'+status,
	   	method:'get',
	   	success: function(result){

	    $('.circle').hide();
	   		//console.log(result);
	   	}

	   });
	   });

});









	$(document).ready(function(){

/*sweet alert*/

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


/*    $(document).on('click','#edit',function(e){
	        //alert('hell');
   e.preventDefault();
   var link=$(this).attr("action");
	   //alert(link);

    Swal.fire({
  title: 'Are you sure to update?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, update it!'
}).then((result) => {
  if (result.value) {
  	window.location.href=link;
    Swal.fire(
      'Updated!',
      'Your file has been update.',
      'success'
    )
  }
})
});
*/
		
//datepicker

		$('.date').datepicker({
        format: "dd/mm/yy",
        weekStart: 1,
        todayBtn: "linked",
        todayHighlight: true
    });

//Select2 basic example
    $("#select").select2({
        placeholder:"select catagory",
        allowClear: true
    });	


     $("#select2").select2({
        
        allowClear: true
    });
      $("#select3").select2({
        
        allowClear: true
    }); 

      $("#select4").select2({
       
        allowClear: true
    });




    $('#summernote').summernote();
    

    $("#click").click(function(){


	$('p').hide(1000);
	});

});

	

	/*********************image preview*********************************/

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#show').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); 
}

$("#image").change(function() {
  readURL(this);
});


	 





	

	/*********************image preview*********************************/



	 


$("#rana").click(function(){


	alert('hello evvvvvvvvvvvvv');
	});