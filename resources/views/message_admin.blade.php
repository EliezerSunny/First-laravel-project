<!DOCTYPE html>
{{-- main color #29b5e8 --}}
{{-- hover color #58c7ef --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/bss.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message Admin || BSS</title>
    <link rel="stylesheet" href="{{asset('assets/css/logs.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1aef77d8a7.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
</head>
<body>

    <div class="all">
    <form class="forms" action="{{ url('/message_admin')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <img src="assets/images/snowflake.png">

        <h2>Message Admin</h2>

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
            <input type="email" title="Email" class="input" name="email" placeholder="Email">
        </div>

        <div class="form-control">
            <input type="file" title="Picture" class="input" name="picture">
        </div>

        <div class="form-control">
            <button class="button">Drop Message</button>
        </div>


        <hr class="hr">


        <div class="join">
            <p>Upload your: Name, Email and Picture!!!</p>
        </div>


        </div>
    </form>
    </div>

    
</body>
</html>