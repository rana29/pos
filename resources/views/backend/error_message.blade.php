                  @if (Session('success'))
                    <div class="alert bg-primary fade in">
                    	<a href="#" class="close close-info" data-dismiss="alert">×</a>
                    	
                    {{Session('success')}}

                    </div>
                    @endif 
                    

					@if(count($errors)>0)

					@foreach($errors->all() as $error)

					<div class="alert bg-success fade in">
                    	<a href="#" class="close close-info" data-dismiss="alert">×</a>
                    	
                     {{$error}}

                    </div>

					@endforeach

					@endif
