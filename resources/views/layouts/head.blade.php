<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/bss.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard || BSS</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/logs.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/output.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1aef77d8a7.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>

    <meta name="og:description" content="Keep your document safe..." />
    <meta name="keywords" content="Documentation.">
    <meta name="author" content="Eliazer Adetunji" />
    <meta name="TitleImage" content="{{asset('assets/images/bss.png')}}" />

    <meta property="og:local" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Documentation - BSS" />
    <!-- <meta property="article:publisher" content="https://m.facebook.com/maxbeatx/" /> -->
    <meta property="og:image" content="{{asset('assets/images/bss.png')}}" />
    <!-- <meta property="og:url" content="https://www.bss.com" /> -->
    <meta property="og:site_name" content="BSS" />
</head>
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