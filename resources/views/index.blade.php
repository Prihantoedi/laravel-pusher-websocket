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
            <form>
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <button></button>
            </form>
            
        </div>
    </div>
</body>
<script>
    const pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'eu'});

    const channel = pusher.subscribe('public');

    // Receive messages
    channel.bind('chat', function(data){
        $.post("/receive", {
            _token: '{{csrf_token()}}',
            message: data.message,
        })
            .done(function (res){
                $('.messages > .message').last().after(res);
                $(document).scrollTop($(document).height());
            });
        
    });

    // Broadcast messages
    $("form").submit(function(event){
        event.preventDefault();
        
        $.ajax({
            url: '/broadcast',
            method: 'POST',
            headers: {
                'X-Socket-Id' : pusher.connections.socket_id
            },
            data : {
                _token: '{{csrf_token()}}',
                message: ${"form #message"}.val(),
            }
        })done(function(res){
            $(".messages > .message").last().after(res);
            $("form #message").val('');
            $(document).scrollTop($(dcoument).height());
        });
    });

</script>
</html>