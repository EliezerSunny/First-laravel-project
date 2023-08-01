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

<!--- INLINE COUNT --->
<div class="inline-count">

   <!--- MANAGE GROUP --->
               
                     <div class="Category-count">
                        

                        <div class="profile-title">
                           <p>Basic Profile</p>
                        </div>
                        

                        <div class="horizontal"></div>


                        
                        <div class="main-profi">

                           <div class="main-profi-img">
                              <img src="{{url('assets/picture/' . Auth::user()->picture)}}" title="{{Auth::user()->name}}" alt="{{Auth::user()->name}}" style="width: 80px; height: 80px; object-fit: cover;" class="m-auto">

                              <p><a href="{{url('edit_profile')}}"><button class="buttons" title="Edit profile">Edit profile</button></a></p>
                           </div>

                           <table class="table">
                           <tr>
                           <td><b>Name :</b></td>  
                           <td><span>{{Auth::user()->name}}</span></td>
                           </tr>
                           <tr>
                           <td><b>E-mail :</b></td>  
                           <td><span>{{Auth::user()->email}}</span></td>
                           </tr>
                           </table>

                           {{-- <p><b>Email :</b>     <span style="margin-left: 26px">{{Auth::user()->name}}</span></p> --}}

                           
                        </div>

                     
                        
                        
                     
               </div>
            
<!--- MANAGE GROUP END --->



<div class="card_grid">
   <!--- MANAGE GROUP --->
   
<div class="manage-group">
   <a href="{{url('all_members')}}">
   
               
                     <div class="Category-count" title="Total No. of Members">

                        

                           <div class="head-color"></div>

                           <div class="main-profi2">

                        <p style="margin-top: 10px;">Total No. of Members</p>

                        <h2>{{Auth::user()->count()}} <small></small></h2>

                        </div>
                     
               </div>
   </a>
            

</div>
<!--- MANAGE GROUP END --->

<!--- MANAGE GROUP --->
{{-- <div class="manage-group">
   
               
                     <div class="Category-count" title="Total No. of Categories">

                       

                           <div class="head-color"></div>

                           <div class="main-profi2">
                        <p style="margin-top: 10px;">Total No. of Categories</p>

                        <h2>{{count($posts)}} <small></small></h2>

                        </div>
                     
               </div>
            

</div> --}}
<!--- MANAGE GROUP END --->

<!--- MANAGE GROUP --->
<div class="manage-group">
   <a href="{{url('#files')}}">
   
               
                     <div class="Category-count" title="Total No. of Files">

                        

                           <div class="head-color"></div>

                           <div class="main-profi2">
                        <p style="margin-top: 10px;">Total No. of Files</p>

                        <h2>{{count($postss)}} <small></small></h2>

                        </div>
                     
               </div>
   </a>

</div>
<!--- MANAGE GROUP END --->


<!--- MANAGE GROUP --->

<div class="manage-group">
   <a href="{{url('message')}}">
  
               
                     <div class="Category-count" title="Total No. of Mesages">

                        

                           <div class="head-color"></div>

                           <div class="main-profi2">
                        <p style="margin-top: 10px;">Total No. of Mesages</p>

                        <h2>{{count($messages)}} <small></small></h2>

                        </div>
                     
               </div>
   </a>

</div>
<!--- MANAGE GROUP END --->

</div>


</div>
<!--- INLINE COUNT END --->


<br/>


<!--- MANAGE GROUP --->
         <div class="manage-group">

            

            <br>

            <div class="Category-count-table">
         <h4>Recent Uploaded Files</h4>


         <div class="table-responsive" id="files">
            <button class="buttons"><a href="{{url('upload_file')}}"><i class="fa fa-plus-circle"></i> Upload File</a></button>

            <div class="search">
               <form action="{{url('search')}}" method="GET">
                  <input type="search" class="search_input" name="q" placeholder="Search file...">
                  <button><i class="fa fa-search"></i></button>
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
                                       <td><a href="{{url('assets/documentation/' . $post->file_name)}}" download="{{$post->title}} - (BSS)"><button class="buttons" title="Download File"><i class="fa fa-download"></i> Download File</button></a></td>
                           
                        </tr>
                        @endforeach

                        @endif
                                 
                              </table>

                              <div class="mt-2">
                              {{$posts->links()}}
                              </div>

                           </div>

                        </div>

                       </div>
                       <!--- MANAGE GROUP END --->

                       <br>

<div class="Category-count-table">

   <div class="profile-title">
                           <p>Device Status</p>
                        </div>
                        

                        <div class="horizontal"></div>
                        <br>

<table class="table">
      <tr>
         <th>Ip</th>
         <th>Device</th>
         <th>Os</th>
         <th>Browser</th>
      </tr>
      <tr>
         <td> {{Request::ip()}}</td>
         <td> {{Agent::device()}}</td>
         <td> {{Agent::platform()}} {{Agent::version(Agent::platform())}}</td>
         <td> {{Agent::browser()}}</td>
      </tr>
   </table>
</div>



		</div>
	</div>


      @include('layouts.chat-button')

   
      @include('layouts.footer')

    

</body>
</html>
