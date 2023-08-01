
<div class="header">

	<div class="nav-menu" onclick="openNav()">
			<i class="fa fa-bars"></i>
		</div>
		
	<div class="logo">
		
		<img src="{{('assets/images/snowflake.png')}}" alt="BSS">


		
	</div>

	<ul class="head">
		
		<li>
			
			<a href="#"><img src="{{url('assets/picture/'. Auth::user()->picture)}}" title="{{Auth::user()->name}}" alt="{{Auth::user()->name}}"></a></li>

			<li>
				@if (count($messages) > 0)
				<a href="{{url('/message')}}"><i class="fa fa-bell" style="color: #fff;" title="Messages notification"></i> 
					<sup style="background: #d0342c; border-radius: 100%; border: 1px solid #314556; color: #fff; padding: 2px 4px; font-size: 8px; margin-left: -12px; margin-bottom: -5px;">{{count($messages)}}</sup>
				</a>
				@endif
			</li>



		
		<li class="head-last-logout">
		<form action="/logout" method="POST">
			@csrf
			<button title="Logout" >Logout <i class="fa fa-arrow-right-from-bracket"></i></button>
			
		</form>
	</li>
	
	</ul>
</div>