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



<!--- MANAGE GROUP --->
         <div class="manage-group">

            

            <br>

            <div class="Category-count-table">
         <h4>Search File...</h4>


         <div class="table-responsive">
            <button class="buttons"><a href="{{url('upload_file')}}"><i class="fa fa-plus-circle"></i> Upload File</a></button>

            <div class="search">
               <form action="{{url('search')}}" method="GET">
                  <input type="search" class="search_input" name="q" placeholder="Search file...">
                  <button>&#xe003;</button>
               </form>
            </div>
                              <table class="table" id="example" style="margin-top: 5px;">
                                    <tr>
                                       
                                       <th>#</th>
                                       <th>File Name</th>
                                       <th>File Image</th>
                                       <th>File Description</th>
                                       <th>File Category</th>
                                       <th>Uploaded Date</th>
                                       <th>Download File</th>
                                    </tr>
                                    
                                    @if ($results->count() > 0)
                                        
                           @foreach($results as $post)
                        <tr>
                           
                           <td>{{$loop->iteration}}</td>
                                       <td>{{$post->title}}</td>
                                       {{-- <td><img src="{{url('assets/documentation/' . $post->file_name)}}" title="{{$post->title}}" style="width: 80px; border-radius: 50%; object: fit;" alt="{{$post['title']}}"></td> --}}
                                       <td><object data="{{url('assets/documentation/' . $post->file_name)}}" type="" title="{{$post->title}}" width="100"></object></td>
                                       <td>{{$post->body}}</td>
                                       <td>{{$post->categery}}</td>
                                       <td>{{$post->created_at}}</td>
                                       <td><a href="{{url('assets/documentation/' . $post->file_name)}}" download="{{$post->title}} - (BSS)"><button class="buttons" title="Download File"><i class="fa fa-download"></i> Download File</button></a></td>
                           
                        </tr>
                        @endforeach

                        @else

                        <tr>
                            <td colspan="7">
                               <h3 style="color:red; text-align: center;">No result found.</h3>
                            </td>
                         </tr>

                        @endif
                                 
                              </table>
                              {{-- {{$posts->links()}} --}}
                           </div>

                        </div>

                       </div>
                       <!--- MANAGE GROUP END --->


		</div>
	</div>

   @include('layouts.chat-button')
   
      @include('layouts.footer')

    

</body>
</html>
