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

<!--- Edit profile --->

<div class="alll">

    <form class="form" action="/edit_profile" method="POST" enctype="multipart/form-data">
        @csrf
		@method('PUT')

        <h2>Update Profile</h2>

        @if (session('success'))
    <div class="success">
        {{session('success')}}
    </div>
    @elseif(session('error'))
    <div class="error">
        {{session('error')}}
    </div>
    @endif

        <div class="inputs">
            <div class="form-control">
                <input type="text" name="name" title="Name" class="input" value="{{Auth::user()->name}}">
            </div>
        <div class="form-control">
            <input type="email" class="input" name="email" title="E mail" value="{{Auth::user()->email}}">
        </div>
        <div class="form-control">
            <input type="password" class="input" name="password" id="password" title="Please re-enter/change your password to update" placeholder="Please re-enter your password">
            <span class="showpassword" onclick="showPassword(this)"><i class="fa fa-eye"></i></span>
        </div>

        <div class="form-control">
            <input type="file" class="input" title="Edit Profile" name="picture">
        </div>

        {{-- <label for="img">Previous File</label> --}}
        <div class="form-control">
            <img src="{{url('assets/picture/' . Auth::user()->picture)}}" style="width: 80px; height: 80px; border-radius: 50%; border: 1px solid #29b5e8; object-fit: cover; margin: auto;" alt="{{Auth::user()->name}}">
        </div>


        <div class="form-control">
            <button class="button">Update Profile</button>
        </div>

        </div>
    </form>

</div>

<!--- Edit profile end --->

		</div>
	</div>


    @include('layouts.chat-button')
    
      @include('layouts.footer')

    

</body>
</html>
