@extends('header')

@section('content')
<style>
    .login-table{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        width: 600px;
        height: 300px;
        margin-left: 100px ;
        margin-top:50px;
        border-radius: 25px;
    }
    .form{
        margin-left: 180px;
    }
    .input-group{
        outline: none;
        border:2px solid black;
        border-radius:4px;
        width:200px;
        height:50px;
        border-radius:10px;
    }
    .label{
        weight:800;
        font: bold;
    }
    .submit-button{
        border-radius: 25px;
    }
</style>
<div class="login-table">
    <form class ='form' action="/login" method="POST">
        @csrf
        <p><label for="email" class="label">Email</label></p>
        <p><input type="text" name="email" id="email" class="input-group"></p>
        <p><label for="password" class="label">Password</label></p>
        <p><input type="password" name="password" id="password" class="input-group"></p>
        <p><button name = 'submit' id = 'submit' class="submit-button">Submit</button></p>
     </form>
</div>
@endsection
