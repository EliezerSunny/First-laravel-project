<!DOCTYPE html>
{{-- main color #29b5e8 --}}
{{-- hover color #58c7ef --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/bss.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login || BSS</title>
    <link rel="stylesheet" href="{{asset('assets/css/logs.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1aef77d8a7.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
</head>
<body>

    <div class="all">
    <form class="forms" action="{{ url('/login')}}" method="POST">
        @csrf
        <img src="assets/images/snowflake.png">

        <h2>Sign in</h2>

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
            <input type="email" title="Email" class="input" name="loginemail" placeholder="Email">
        </div>
        <div class="form-control">
            <input type="password" title="Password" class="input" id="password"  name="loginpassword" placeholder="Password">
            <span class="showpassword" onclick="showPassword(this)"><i class="fa fa-eye"></i></span>
        </div>

        <div class="check-forget">
            <div class="check">
                <input type="checkbox" checked="checked" id="check" name="checkbox">
                <label for="check">Remember me</label>
            </div>

            <div class="forget-password">
                <a href="{{url('forgot-password')}}"><p>Forgot password!</p></a>
            </div>
        </div>


        <div class="form-control">
            <button class="button">Sign In</button>
        </div>
    

        <hr class="hr">


        <div class="join">
            <p>Wanna join? Contact @ <a href="{{url('message_admin')}}">Admin</a> </p>
        </div>

        </div>
    </form>
    </div>

    
</body>
</html>