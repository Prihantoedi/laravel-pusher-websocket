<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{URL::asset('style.css')}}">
</head>
<body>
    <div class="chat">
        <div class="top">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXElxyzRuhdkeJWPkQ9FVIiPZJITEQZ4nctTPQ1kMlZXZZLuVQCQRhZPtTzg&s" alt="Profile picture">
            <div>
                <p>Ross Edlin</p>
                <small>Online</small>
            </div>
        </div>

        <div class="messages">
            @include('receive', ['message' => "Hey! What's up! NBSP"])
        </div>

        <div class="bottom">
            <form action="">
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <button></button>
            </form>
            
        </div>
    </div>
    
</body>
</html>