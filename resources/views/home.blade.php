@extends('header')

@section('content')
<style>
     .posts-item{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

                width:97%;
                background:white;
                /* border:1px solid black; */
                padding: 5px;
                font-size: 15px;
                font-weight: 600;
                margin-bottom: 10px;
                margin-top: 10px;
                margin-right:5px;
                margin-left: 8px;
                border-radius: 10px;
                word-wrap: break-word;

        }
        .post-submit{
                border-radius: 10px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                height: 200px;
                margin-bottom:15px;
                margin-right:5px;
                margin-left: 8px;
                margin-top: 15px;
                width: 98%;
                background:white;
        }
    .input-group{
        outline: none;
        border:2px solid black;
        border-radius:4px;
        width:90%;
        margin-left: 30px;
        margin-top:20px;
        height:100px;
        border-radius:10px;
        resize:none;
    }
    .submit-button{
        border:2px solid black;
        border-radius:4px;
        width:90%;
        height:30px;
        margin-left: 30px;
        margin-top: 10px;
        background:#3b5998 ;
        border-radius:10px;
        color:white;
        font-weight: 600;
    }

</style>
<div class="post-content">
    <div class="post-submit">
        <form action="./home" method="POST" id="post-form">
            @csrf
            <textarea type="textbox" name="post" id="post" class="input-group"></textarea>
            <button name = 'submit' id = 'submit' class="submit-button">post</button>
            <input type="hidden" value='{{Auth::user()->id}}' name='user_id' id="user_id"/>
        </form>
    </div>
        @foreach ($posts as $item)
        <div class="posts-item">
            <h2>{{$item->user->name }}</h2>
            <hr>
            {{$item->post}}
        </div>
        @endforeach
</div>

<script>
    function postCreate(){
        axios.post('/home',$('#post-form').serialize())
            .then(response =>{
                $('#post').val("")
                $("<div class='posts-item'><h2>"+"{{Auth::user()->name}}"+"</h2><hr>"+ response.data.post +"</div>").insertAfter('.post-submit');
            })
            .catch(error =>{
                console.log(error)
            })
    }
    $(function(){
        $('.post-submit').submit(function(event){
            event.preventDefault()
            postCreate()
        });
        $('#post').keypress(function(event){
            if(event.which==13){
                event.preventDefault()
                postCreate()
            }
        })
    });
</script>
@endsection
