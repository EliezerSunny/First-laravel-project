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

<!--- Edit file --->

<div class="alll">

    <form class="form" action="/edit_file/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf
		@method('PUT')

        <h2>Update File</h2>

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
                <input type="text" name="title" title="Title" class="input" value="{{$post->title}}">
            </div>
        <div class="form-control">
            <input type="text" class="input" name="category" title="Category" value="{{$post->categery}}">
        </div>
        <div class="form-control">
            <textarea name="description" class="input" title="Description" placeholder="Description">{{$post->body}}</textarea>
        </div>

        <div class="form-control">
            <input type="file" class="input" title="Edit File" name="file_name">
        </div>

        {{-- <label for="img">Previous File</label> --}}
        <div class="form-control">
            <object data="{{url('assets/documentation/' . $post->file_name)}}" type="" title="{{$post->title}}" width="100"></object>
        </div>


        <div class="form-control">
            <button class="button">Update File</button>
        </div>

        </div>
    </form>

</div>

<!--- Edit file end --->

		</div>
	</div>


    @include('layouts.chat-button')
    
      @include('layouts.footer')

    

</body>
</html>
