<?php 

   // Below function will convert datetime to time elapsed string
function time_elapsed_string($datetime, $full = false) {
    $time_ago = strtotime($datetime);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60 
      $month = date('j M, Y', $time_ago); 
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "1 minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "1 hour ago";  
     }  
           else  
           {  
       return "$hours hours ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "$month";  
     } 
   }  

}


   
       ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/images/bss.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat || BSS</title>
    <link rel="stylesheet" href="{{asset('../assets/css/chat.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('../assets/css/logs.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('../assets/css/output.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1aef77d8a7.js" crossorigin="anonymous"></script>
    <script src="{{asset('../assets/js/script.js')}}" type="text/javascript"></script>

    <meta name="og:description" content="Keep your document safe..." />
    <meta name="keywords" content="Documentation.">
    <meta name="author" content="Eliazer Adetunji" />
    <meta name="TitleImage" content="{{asset('../assets/images/bss.png')}}" />

    <meta property="og:local" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Documentation - BSS" />
    <!-- <meta property="article:publisher" content="https://m.facebook.com/maxbeatx/" /> -->
    <meta property="og:image" content="{{asset('../assets/images/bss.png')}}" />
    <!-- <meta property="og:url" content="https://www.bss.com" /> -->
    <meta property="og:site_name" content="BSS" />
    
</head>
<body>
    <div class="header">
        <div class="sub_header">
            <img src="{{asset('../assets/images/snowflake.png')}}" alt="BSS">
        </div>

        <ul class="head">
		
            <li>
                
                <a href="#"><img src="{{url('assets/picture/'. Auth::user()->picture)}}" title="{{Auth::user()->name}}" alt="{{Auth::user()->name}}"></a>
            </li>
        
        </ul>
    </div>

    <div class="line"></div>

    <!--- main-container --->

    <div class="container">


        <div class="left_chat">

            <h3 class="chat_head">BSS Group Chat</h3>

            @if (count($users) === 0)
            <div class="chat_null">
                <p>No user to chat with yet!</p>
            </div>
                                    
            @else

            @foreach ($users as $user)
            <!--- user-chat --->
            <div class="line"></div>
            <div class="all_users">
            <div class="users_img">
                <img src="{{url('assets/picture/' . $user->picture)}}" title="{{$user->name}}" alt="{{$user->name}}">
            </div>
            
            <div class="users_text">
                
                <h4>{{$user->name}}</h4>
                @if (Auth::user())
                    <p>{{$user->status}}</p>
                @else
                    <p>Offline</p>
                @endif
                
            </div>
            
            </div>
            <div class="message_time">
                <span><?php echo time_elapsed_string($user->created_at)?></span>
            </div>
            <!--- user-chat end --->
            @endforeach

            @endif

        </div>


        <div class="line2"></div>


        <!--- left-main-chat --->
    <div class="chat_container">

        @if (session('success'))
      <div class="success">
          {{session('success')}}
      </div>
      @elseif(session('error'))
      <div class="error">
          {{session('error')}}
      </div>
      @endif


      @if (count($chats) === 0)
            <div class="chat_null">
                <p>No conversation yet!!!</p>
            </div>
                                    
            @else
      
          <!--- main-chat --->
          @foreach ($chats as $chat)

      
      <div class="view_chats">

        @if ($chat->outgoing_msg_id == Auth::user()->unique_id)
        <div class="outgoing_message">
            
            <div class="outgoing_chats">
                <span>{{$chat->chat_input}}</span>
                <span class="time"><?php echo time_elapsed_string($chat->created_at)?> <i class="fa fa-check"></i></span>
            </div>
            <div class="outgoing_img">
                <img src="{{url('assets/picture/' . $chat->picture)}}" title="{{$chat->name}}" alt="{{$chat->name}}">
            </div>
        </div>

        @else

        <div class="incoming_message">
            <div class="incoming_img">
                <img src="{{url('assets/picture/' . $chat->picture)}}" title="{{$chat->name}}" alt="{{$chat->name}}">
            </div>
            <div class="incoming_chats">
                <span>{{$chat->chat_input}}</span>
                <span class="time"><?php echo time_elapsed_string($chat->created_at)?> <i class="fa fa-check"></i></span>
            </div>
        </div>
        @endif

      </div>
          
      @endforeach
      <!--- main-chat end --->

        @endif




        <div>
        <form class="chat_form" action="{{ url('/conversation/chat')}}" method="POST">
            @csrf
        <div class="chat_input">
            <input type="text" name="chat_input" placeholder="Start Conversation..." title="Start Conversation">
        </div>
        <div class="send_button">
            <button title="Send"><i class="fa fa-send-o"></i></button>
        </div>
        </form>
        </div>
    

    </div>
    <!--- left-main-chat end --->

</div>
<!--- main-container end --->

</body>
</html>