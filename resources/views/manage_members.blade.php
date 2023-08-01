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

<!--- Users --->

<div class="Category-count-table">

	<div class="profile-title">
							<p>Manage Members</p>
							
						 </div>
						 
 
						 <div class="horizontal"></div>
						 
						 <div class="table-responsive">
							<table class="table" id="example">
								{{-- <h5 style="font-weight: 100; font-style: italic; color: #808080;">The first 3 members are the founder of BSS.</h5> --}}
								  <tr>
									 
									 <th>#</th>
									 <th>Member Name</th>
									 <th>Member Image</th>
									 <th>Added Date</th>
                                     <th>Action</th>
								  </tr>

						 @foreach ($users as $user)
						 <tr>
							<td>{{$user['id']}}</td>
										<td>{{$user->name}}</td>
										<td><img src="{{url('assets/picture/' . $user->picture)}}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;" alt="{{$user['name']}}"></td>
										<td><?php echo time_elapsed_string($user->created_at)?></td>
                                        <td>
                                            <div class="action_butoon">
                                                {{-- <button class="edit_file" title="Edit file"><a href="/edit_file/{{$post->id}}"><i class="fa fa-pencil"></i></a></button> --}}
        
                                                <form  action="/delete_member/{{$user->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete_file" title="Delete Member"><i class="fa fa-trash-o"></i></button>
                                                </form>
        
                                            </div>
        
                                        </td>
						 </tr>
						 @endforeach
							</table>

							<div class="mt-2">
								{{$users->links()}}
								</div>
								
						</div>
 </div>


<!--- Users end --->

		</div>
	</div>


	@include('layouts.chat-button')
	
      @include('layouts.footer')

    

</body>
</html>
