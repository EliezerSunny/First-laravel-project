<!DOCTYPE html>
{{-- main color #29b5e8 --}}
{{-- hover color #58c7ef --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/bss.png')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recover password || BSS</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/logs.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1aef77d8a7.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
</head>
<body>
    
    <div class="all">
    <form class="forms" action="{{ url('/forgot-password')}}" method="POST">
        @csrf
        <img src="assets/images/snowflake.png">

        <h2>Recover password</h2>

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
            <input type="email" title="Email" class="input" name="forgetpassword" placeholder="Email">
        </div>

        <div class="form-control">
            <button class="button">Submit</button>
        </div>
    

        <hr class="hr">


        <div class="join">
            <p>Make sure to use the registered email! <a href="{{url('/')}}">Back</a></p>
        </div>

        </div>
    </form>
    </div>

    
</body>
</html>