@extends('user.account.account-layout')
@section('content')
<style>
    .information{
        float: left;
        width: 60%;
        margin-top: 100px;
        margin-left: 50px;
    }
    .information input[type="text"], input[type="date"], input[type="email"]{
        height: 40px;
        width: 500px;
        margin-top: 15px;
        margin-bottom: 10px;
    }
    .information label{
        font-size: 25px;
        
    }
    .information input[type="submit"]{
        margin-left: 400px;
        width: 100px;
        height: 40px;
    }
    .image{
        float: right;
        width: 30%;
        margin-top: 150px;
    }
    .image img{
        height: 300px;
        width: 300px;
        border-radius: 50%;
    }
    .image input[type="file"]{
        margin-top: 20px;
        font-size: 20px; 
        width: 300px;;
    }
</style>
<form action="{{route('update.profile_buyer', $user[0]->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())

    <div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

    @foreach ($errors->all() as $error)

    <li>{{ $error }}</li>

    @endforeach

    </ul>

    </div>

@endif
<div class="information">
   
        <div>
             <label for="username">Username</label><br>
             <input type="text" name="username" value="{{$user[0]->user_name}}">
        </div>
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="{{$user[0]->email}}">
        </div>
        <div>
            <label for="number">Number</label><br>
            <input type="text" name="number" value="{{$user[0]->number}}">
        </div>
        <div>
            <label for="birthday">Birthday</label><br>
            <input type="text" name="birthday" id="" value="{{$user[0]->birthday}}">
        </div>
        
        <input type="submit" value="Save">
</div>
<div class="image">
    <img src="phat.jpg" alt="" srcset="">
    <input type="file" name="image" id="">
</div><br>

</form>
@endsection