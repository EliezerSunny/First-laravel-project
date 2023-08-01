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
		

        

		<div class="content">

<br/>

<!--- Manage file --->

<div class="Category-count-table">

	<div class="profile-title">
							<p>Manage Files</p>
							
						 </div>

						 @if (session('success'))
        <div class="success">
            {{session('success')}}
        </div>
        @elseif(session('error'))
        <div class="error">
            {{session('error')}}
        </div>
        @endif
						 
 
						 <div class="horizontal"></div>
						 
						 <div class="table-responsive">
							<table class="table" id="example">
								  <tr>
									 
									 <th>#</th>
									 <th>File Name</th>
									 <th>File Image</th>
									 <th>File Description</th>
									 <th>File Category</th>
									 <th>Uploaded Date</th>
									 <th>Action</th>
								  </tr>
								  
								  @if (count($posts) === 0)
								  <tr>
									 <td colspan="7">
										<h3 style="color:red; text-align: center;">No record found</h3>
									 </td>
								  </tr>
								  @else
									  
					  
						 @foreach($posts as $post)
					  <tr>
						 
						 <td>{{$loop->iteration}}</td>
									 <td>{{$post->title}}</td>
									 {{-- <td><img src="{{url('assets/documentation/' . $post->file_name)}}" title="{{$post->title}}" style="width: 80px; border-radius: 50%; object: fit;" alt="{{$post['title']}}"></td> --}}
									 <td><object data="{{url('assets/documentation/' . $post->file_name)}}" type="" title="{{$post->title}}" width="100"></object></td> 
									 <td>{{$post->body}}</td>
									 <td>{{$post->categery}}</td>
									 <td><?php echo time_elapsed_string($post->created_at)?></td>

									 <td>
									<div class="action_butoon">
										<button class="edit_file" title="Edit file"><a href="/edit_file/{{$post->id}}"><i class="fa fa-pencil"></i></a></button>

										<form  action="/delete_file/{{$post->id}}" method="POST">
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
								{{$posts->links()}}
								</div>

						 </div>

 </div>

<!--- Manage file end --->

		</div>
	</div>


	@include('layouts.chat-button')
	
      @include('layouts.footer')

    

</body>
</html>
