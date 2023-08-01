<!DOCTYPE html>
{{-- main color #29b5e8 --}}
{{-- hover color #58c7ef --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/bss.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Member || BSS</title>
    <link rel="stylesheet" href="{{asset('assets/css/logs.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1aef77d8a7.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
</head>
<body>

    @include('layouts.header')

		 
		@include('layouts.left-sidebar')


        <div class="main-content">
            <p style="color: #d5d5d5; font-weight: 600; font-style: italic;">Welcome, {{Auth::user()->name}}</p>


        <div class="content">

            <br/>
            
    {{-- @auth --}}
    <div class="alll">
    <form class="form" action="{{ route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <img src="assets/images/snowflake.png"> --}}

        <h2>Register</h2>

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
                <input type="text" title="Name" class="input" name="name" placeholder="Name">
            </div>
        <div class="form-control">
            <input type="text" class="input" title="Email" name="email" placeholder="Email">
        </div>
        <div class="form-control">
            <input type="password" class="input" title="Password" id="password" name="password" placeholder="Password">
            <span class="showpassword" onclick="showPassword(this)"><i class="fa fa-eye"></i></span>
        </div>

        <div class="form-control">
            <input type="file" class="input" title="Profile Picture" name="picture" placeholder="Profile Picture">
        </div>

        {{-- <div class="check-forget">
            <div class="check">
                <input type="checkbox" checked="checked" id="check" name="checkbox">
                <label for="check">Remember me</label>
            </div>

        </div> --}}

        <div class="form-control">
            <button class="button">Sign Up</button>
        </div>
    

        {{-- <hr class="hr"> --}}


        {{-- <div class="join">
            <p>Already a member? <a href="{{('/')}}">Login</a></p>
        </div> --}}

        </div>
    </form>
    </div>

    {{-- @endauth --}}


</div>
</div>

@include('layouts.chat-button')

    @include('layouts.footer')

</body>
</html>