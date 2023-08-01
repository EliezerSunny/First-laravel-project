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

<!--- Upload file --->

	<div class="alll">

		<form class="form" action="{{ route('/upload_file')}}" method="POST" enctype="multipart/form-data">
			@csrf

			<h2>Upload File</h2>
	
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
					<input type="title" title="Title" class="input" name="title" placeholder="File Name">
				</div>
			<div class="form-control">
				<input type="text" class="input" title="Category" name="categery" placeholder="Category">
			</div>
			<div class="form-control">
				<textarea name="body" class="input" title="Description" placeholder="Description"></textarea>
			</div>
	
			<div class="form-control">
				<input type="file" class="input" title="Upload File" name="file_name" onchange="document.getElementById('view').src = window.URL.createObjectURL(this.file[0])">
			</div>

			<div class="form-control">
				{{-- <img id="view" alt="File name" style="width: 80px; border-radius: 50%; border: 1px solid #29b5e8;"> --}}
				{{-- <object id="view" type="" width="100"></object> --}}
			</div>
			
	
			<div class="form-control">
				<button class="button">Upload File</button>
			</div>
			
	
			</div>
		</form>

	</div>

<!--- Upload file end --->

		</div>
	</div>


	@include('layouts.chat-button')
	
      @include('layouts.footer')

    

</body>
</html>
