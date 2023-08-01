

<div class="left-sidebar" id="mySidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	<div class="profile-img">
		
        
		<a href="#"><img src="{{url('assets/picture/' . Auth::user()->picture)}}" title="{{Auth::user()->name}}" alt="{{Auth::user()->name}}" class="m-auto"></a>

		{{-- <p>{{Auth::user()->name}}</p> --}}
	</div>

	<ul class="left-sidebar-list-style">
		<li class="dashboard-link"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>


		<li class="has_sub">
			<a href="javascript:void(0);" class="left-sidebar-link"><i class="fa fa-id-card-o"></i> <span> File </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/upload_file')}}">Upload File</a></li>
                                    <li><a href="{{url('/manage_file')}}">Manage File</a></li>
                                </ul>
		</li>


		<li class="has_sub">
			<a href="javascript:void(0);" class="left-sidebar-link"><i class="fa fa-comment-o"></i> <span> Messages </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/message')}}">New Member Messages</a></li>
                                </ul>
		</li>


		{{-- <li class="has_sub">
			<a href="javascript:void(0);" class="left-sidebar-link"><i class="fa fa-image"></i> <span> Home Image </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/bss_home_image')}}">Add BSS Image</a></li>
                                    <li><a href="{{url('/bss_logo')}}">Add BSS Logo</a></li>
                                </ul>
		</li> --}}


		<li class="has_sub">
			<a href="javascript:void(0);" class="left-sidebar-link"><i class="fa fa-circle-info"></i> <span> BSS </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/all_members')}}">All Members</a></li>
									<li><a href="{{url('/manage_members')}}">Manage Members</a></li>
									<li><a href="{{url('/register')}}">Register User</a></li>
                                     {{-- <li><a href="{{url('/admin_in')}}">Admin Login</a></li> --}}
                                </ul>
		</li>
	</ul>
	
</div>


<div class="left-sidebar2">

	<div class="profile-img2">
		

        
		<a href="#"><img src="{{url('assets/picture/' . Auth::user()->picture)}}" title="{{Auth::user()->name}}" alt="{{Auth::user()->name}}" class="m-auto"></a>

		<p>{{Auth::user()->name}}</p>
	</div>

	<ul class="left-sidebar-list-style2">
		<li class="dashboard-link2"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>


		<li class="has_sub2">
			<a href="javascript:void(0);" class="left-sidebar-link2"><i class="fa fa-id-card-o"></i> <span> File </span> <span class="menu-arrow2"></span></a>
                                <ul class="list-unstyled2">
                                    <li><a href="{{url('/upload_file')}}">Upload File</a></li>
                                    <li><a href="{{url('/manage_file')}}">Manage File</a></li>
                                </ul>
		</li>


		<li class="has_sub2">
			<a href="javascript:void(0);" class="left-sidebar-link2"><i class="fa fa-comment-o"></i> <span> Messages </span> <span class="menu-arrow2"></span></a>
                                <ul class="list-unstyled2">
                                    <li><a href="{{url('/message')}}">New Member Messages</a></li>
                                </ul>
		</li>


		{{-- <li class="has_sub2">
			<a href="javascript:void(0);" class="left-sidebar-link2"><i class="fa fa-image"></i> <span> Home Image </span> <span class="menu-arrow2"></span></a>
                                <ul class="list-unstyled2">
                                    <li><a href="{{url('/bss_home_image')}}">Add BSS Image</a></li>
                                    <li><a href="{{url('/bss_logo')}}">Add BSS Logo</a></li>
                                </ul>
		</li> --}}


		<li class="has_sub2">
			<a href="javascript:void(0);" class="left-sidebar-link2"><i class="fa fa-circle-info"></i> <span> BSS </span> <span class="menu-arrow2"></span></a>
                                <ul class="list-unstyled2">
                                    <li><a href="{{url('/all_members')}}">All Members</a></li>
									<li><a href="{{url('/manage_members')}}">Manage Members</a></li>
									<li><a href="{{url('/register')}}">Register User</a></li>
                                     {{-- <li><a href="{{url('/admin_in')}}">Admin Login</a></li> --}}
                                </ul>
		</li>
	</ul>
	
</div>