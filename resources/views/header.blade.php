
<html>
    <head>
        <title></title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/app.js')}}"></script>
        {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}

    </head>
    <body>
        <style>
            .container{
                display: grid;
                grid-template: 10% 90% / 100%;
                height: 100%;
                widows: 100%;
                grid-gap: 10px 10px;
                background: #ffffff;

            }
            .nav{
                border-radius: 25px;
                background: white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .nav-item{
                float:left;
                height: 100%;
            }
            .auth-item{
                float:right;
            }
            .content{
                display: grid;
                grid-template: 100%/1fr 2fr 1fr;

                grid-gap: 10px 10px;;
            }
            .post-content{

                grid-column: 2/3;
                grid-row: 1/2;
                overflow-y:scroll;
                overflow-x:hidden;
                border-radius: 15px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            }
            .post-content::-webkit-scrollbar{
                width: .55rem;
            }
            /* .friend-content::-webkit-scrollbar-track{
                background: grey;
            } */
            .post-content::-webkit-scrollbar-thumb{
                background:grey;
                border-radius: 5rem;
            }
            .friend-content{
                overflow-y:scroll;
                border-radius: 5px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                grid-column: 3/4;
                grid-row: 1/2;
                /* background: yellow; */

            }
            .friend-content::-webkit-scrollbar{
                width: .55rem;
            }
            /* .friend-content::-webkit-scrollbar-track{
                background: grey;
            } */
            .friend-content::-webkit-scrollbar-thumb{
                background:grey;
                border-radius: 5rem;
            }
            .leftdiv{
                grid-column: 1/2;
                grid-row: 1/2;
                /* /background:orange; */
                display: grid;
                grid-template: 30% 70%/100%;
                overflow:hidden;


            }
            .message-content{
                /* background:yellow; */
                display:none;
                grid-row: 2/3;
                grid-column: 1/2;
                /* margin-top:14rem; */
                height: 100%;
                width: 100%;
                display:flex;
                flex-direction:column;

            }
            .message-content-nav{
                background:white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

                height: 40px;
                display:flex;
                flex-direction:row;
                margin-bottom: 1px;
                /* justify-content: space-around; */
            }
            .message-content-body{
                overflow-y:scroll;
                background:white;
                height: 100%;
                word-wrap:break-word;
                display:flex;
                flex-direction: column;

            }
            .message-send{
                background: white;
                height:80px;
            }
            #message-send-form{
                width:100%;
                height:100%;
                display: flex;
                flex-direction: row;
            }
            .posts{

                /* background: purple; */
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            li {
                float: left;
                margin-top: 10px;
                font-size: 25px;
             }

            li a {
                border-radius: 25px;
                font-weight: 1000;
                display: block;
                color: blue;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            li a:hover {
                background-color: lightgray;
            }
            .auth-item a{
                font-weight: 1000;
                margin-top: 15px;
                font-size: 20px;
                display: inline-block;
                color: blue;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }


            .friend-item{
                width:95%;
                background:white;
                /* border:1px solid black; */
                padding: 5px;
                font-size: 15px;
                font-weight: 600;
                margin: 5px;
                border-radius: 5px;

            }
            .friend-item:hover{
                background: lightgrey;
            }
            #message-input{
                outline: none;
                border:2px solid black;
                border-radius:4px;
                width:80%;
                margin-left: 10px;
                margin-top:20px;
                height:40px;
                border-radius:10px;
                resize: none;

            }
            #message-button{
                outline: none;
                border:2px solid black;
                border-radius:4px;
                /* width:10%; */
                margin-left: 5px;
                margin-top:25px;
                height:30px;
                border-radius:10px;
            }
            .messages-received{
                align-self: flex-start;
                max-width: 70%;
                padding: 10px;
                margin:5px;
                float: left;
                border-radius:10px;
                display: inline-block;
                background:gainsboro;
                word-wrap: break-word;
                color:black;
            }
            .messages-sent{
                align-self:flex-end;
                max-width: 70%;
                padding: 10px;
                margin:5px;
                color:white;
                border-radius:10px;
                display: inline-block;
                background:#3b5998;
                word-wrap: break-word;
            }

            .onLine{
                height: 15px;
                width: 15px;
                background-color: green;
                border-radius: 50%;
                display: inline-block;
                float:right;
                margin-top:1px;
            }
            .offLine{
                height: 15px;
                width: 15px;
                background-color: red;
                border-radius: 50%;
                display: inline-block;
                float:right;
                margin-top:1px;
            }
        </style>
        <div class="container">
            <div class="nav">
                    <div class="nav-item">
                        <ul>
                            <li><a  href="/">ChatBox</a></li>
                            <li><a href="/home">Home</a></li>
                            <li><a href="/posts">Posts</a></li>
                        </ul>
                    </div>
                    <div class="auth-item">
                        @auth
                       <a href="./users/{{Auth::user()->id}}">{{Auth::user()->name}}</a>
                    <span id = "user_id" style="display:none">{{Auth::user()->id}}</span>
                            <a href=" ./logout "
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            </a>
                        @else
                        <a href="./login">LogIn</a>
                        <a href="./register">Register</a>
                        @endauth
                        <form id="logout-form" action="./logout" method="POST">
                            @csrf
                        </form>
                       </div>
            </div>
            @yield('pre-content')
            <div class="content">
                <div class="leftdiv">
                    <div class="message-content" id="message-content">
                        <div class="message-content-nav" >
                            <div class="friend-name" style='background:white;color:black;;margin-left:10px;padding:10px;font-weight:1000'></div>
                            <input type="hidden" id="friend-id"/>
                            <button style="height:100%;width:50px;margin-left:auto;background:white;border:none" id='cancel'><img src="/image/download.png" style="height: 50%;width:50%"> </button>
                        </div>
                        <span id="mesg_loading"></span>
                        <div class="message-content-body" id="message-content-body">
                            {{-- <div class="messages-sent"></div>
                            <div class="messages-received"></div> --}}
                        </div>
                        <span id="next_mesg_page" style="display: none"></span>
                        <div class="message-send">
                            <form method="POST" action="" id='message-send-form'>

                                <textarea name="message" id="message-input"></textarea>

                                <button id="message-button">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
                @yield('content')
                @auth
                <div class="friend-content">

                    @foreach ($users as $item)
                    <div class="friend-item" onclick="showMessage({{$item}})"> {{$item->name}} <span class={{$item->isOnline()?"onLine":"offline"}}></span></div>
                    @endforeach
                {{-- <span id="friend_page" style="display: none">{{$users->nextPageUrl()}}</span> --}}
                </div>
                @endauth
            </div>
        </div>

    </body>
    <script>
        $(function(){
            if($('#user_id').text() !=''){
                Echo.private('sent-to.'+$('#user_id').text())
                .listen('.message-sent',(e)=>{
                    // console.log('Echo is working for private ')
                    // console.log(e)
                    $('.message-content-body').append("<div class='messages-received'>"+e.mesg.message+"</div>")
                    $('.message-content-body').animate({
                    scrollTop: '10000000px'
                    },1000);
                })
            }
        })

        $(function(){
            var isAvailable = true
            $('.message-content-body').scroll(function(){
                // console.log($('.message-content-body').scrollTop())
                var h = $('.message-content-body').height()
                if($('.message-content-body').scrollTop()<1 && $('#next_mesg_page').text()!=''){

                    if(isAvailable){
                        isAvailable=false;
                        setTimeout(()=>{
                            isAvailable=true
                        },2000)
                    var link = $('#next_mesg_page').text()
                    $("#mesg_loading").text('Loading.....')
                        axios.get(link)
                            .then(response =>{
                                // console.log(response.data)
                                var text = $('#user_id').text()
                                var id = parseInt(text,10)
                                var friendId = parseInt($('#friend-id').val(),10)
                                $("#mesg_loading").text('')
                                response.data.data.forEach(item => {
                                    // console.log('yes')
                                    if((id>friendId && item.direction==false) || (id<friendId && item.direction==true)){
                                        $('.message-content-body').prepend("<div class='messages-sent'>"+item.message+"</div>")
                                    }
                                    else{
                                        $('.message-content-body').prepend("<div class='messages-received'>"+item.message+"</div>")
                                    }
                                })
                                if(response.data.next_page_url!=null)$('#next_mesg_page').text(response.data.next_page_url)
                                else $('#next_mesg_page').text("")
                                // if(response.data.next_page_url==null)console.log(response.data.next_page_url)
                                $('.message-content-body').scrollTop(h)
                            })
                            .catch(error => {
                                // console.log(error)
                            })
                    }

                }
            })
        })
    function showMessage(Content)  {
        $('#next_mesg_page').text('')
        $('.message-content').show();
        $('.message-content-body').empty()
        // console.log(Content.name)
        $('.friend-name').text(Content.name)
        $('#friend-id').val(Content.id)
        // console.log($('#friend-id').val())
        axios.get('/message/'+Content.id)
        .then(response =>{
            // console.log(response.data)
            var text = $('#user_id').text()
            var id = parseInt(text,10)
            response.data.data.forEach( item => {
                // console.log('yes')
                if((id>Content.id && item.direction==false) || (id<Content.id && item.direction==true)){
                    $('.message-content-body').prepend("<div class='messages-sent'>"+item.message+"</div>")
                }
                else{
                    $('.message-content-body').prepend("<div class='messages-received'>"+item.message+"</div>")
                }
            })
            $('.message-content-body').animate({
                scrollTop: '10000000px'
            },1000);
            // console.log(response.data.next_page_url)
            $('#next_mesg_page').text(response.data.next_page_url)
        })
        .catch(error =>{
            // console.log(error)
        })
    }
    $(function(){
        $('#cancel').click(function(){
             $('.message-content').hide();
        })
    })
    $(
        function(){
            $('.message-content').hide();
        }

    )
    // $(
    //     $('.friend-content').scroll(function(){
    //         console.log($('.friend-content').height())
    //     })
    // )
    function sendMessage(){
            var k = $('#friend-id').val()
            // console.log(k)
            // console.log('click hoise')
            axios.post("/message/"+$('#friend-id').val(),
            $('#message-send-form').serialize())
            .then(response =>{
                // console.log(response.data)
                $('#message-input').val('')
                $('.message-content-body').append("<div class='messages-sent'>"+response.data.message+"</div>")
                $('.message-content-body').animate({
                scrollTop: '10000000px'
                },1000);

            })
            .catch(error =>{
                // console.log(error)
            })
    }
    $(function(){
        $('#message-button').click(function(event){
            event.preventDefault()
            sendMessage();
        })
        $('#message-input').keypress(function(event){
            if (event.which == 13) {
            event.preventDefault()
            sendMessage();
        }
        })
    })
    </script>
</html>
