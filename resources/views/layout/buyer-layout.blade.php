<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/5ee30b7051.js" crossorigin="anonymous"></script>
   
    <title>Document</title>
</head>
<body>
    <header>
        <ul>
            <li><img src="https://1000logos.net/wp-content/uploads/2022/08/Uniqlo-logo.png" alt="" srcset=""></li>
            <li><a href="{{route('index.nam')}}">NAM</a></li>
            <li>NỮ</li>
            <li>TRẺ EM</li>
            <li>TRẺ SƠ SINH</li>
            <li><i class="fa-solid fa-magnifying-glass"></i></li>
            <li><i class="fa-solid fa-cart-shopping"></i></li>
            <li id="account">
                {{-- <img src="{{asset('avatar/'.$user[0]->avatar)}}" alt="" srcset="">
                <p>{{$user[0]->user_name}}</p>
                <i class="fa-solid fa-caret-down"></i> --}}
            </li>
        </ul>
    </header>
    <hr>
        @yield('content');
    
</body>
</html>