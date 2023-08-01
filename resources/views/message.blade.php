<!DOCTYPE html>
{{-- main color #29b5e8 --}}
{{-- hover color #58c7ef --}}
<html lang="en">

@include('layouts.head')
<body>
    
	
		
	@include('layouts.header')

		 
		@include('layouts.left-sidebar')
		

	<div class="main-content">
		<p style="color: #d5d5d5; font-weight: 600; font-style: italic;">Welcome, {{Auth::user()->name}}</p>

		 
		{{-- @include('layouts.info')  --}}
		

		@if (session('success'))
		<div class="success">
			{{session('success')}}
		</div>
		@elseif(session('error'))
		<div class="error">
			{{session('error')}}
		</div>
		@endif

		<div class="content">

<br/>

<!--- Upload file --->


<!--- messages --->

<div class="Category-count-table">

	<div class="profile-title">
							<p>Messages</p>
							
						 </div>
						 
 
						 <div class="horizontal"></div>
						 
						 <div class="table-responsive">
							<table class="table" id="example">
								  <tr>
									 
									 <th>#</th>
									 <th>Name</th>
									 <th>E-mail</th>
									 <th>Image</th>
									 <th>Date</th>
									 <th>Action</th>
								  </tr>

								  @if (count($messages) === 0)
                                    <tr>
                                       <td colspan="6">
                                          <h3 style="color:red; text-align: center;">No record found</h3>
                                       </td>
                                    </tr>
                                    @else

						 @foreach ($messages as $message)
						 <tr>
							<td>{{$message['id']}}</td>
										<td>{{$message['name']}}</td>
										<td>{{$message['email']}}</td>
										<td><img src="{{url('assets/message/' . $message->picture)}}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;" alt="{{$message['name']}}"></td>
										<td><?php echo time_elapsed_string($message->created_at)?></td>
										<td>
											<div class="action_butoon">
		
												<form  action="/delete_message/{{$message->id}}" method="POST">
													@csrf
													@method('DELETE')
													<button class="delete_file" title="Delete file"><i class="fa fa-trash-o"></i></button>
												</form>
		
											</div>
		
										</td>
						 </tr>
						 @endforeach

						 @endif
							</table>

							<div class="mt-2">
								{{$messages->links()}}
								</div>

						</div>
 </div>


<!--- messages end --->

		</div>
	</div>


	@include('layouts.chat-button')
	
      @include('layouts.footer')

    

</body>
</html>
