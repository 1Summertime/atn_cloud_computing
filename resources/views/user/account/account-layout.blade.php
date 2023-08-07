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
    <style>
         .account{
            height: 800px;
            width: 1400px;
            margin-top: 100px;
            margin-left: 300px;
            background-color: #F5F5F5;
        }
        .category-account{
            float: left;
            width: 20%;
            margin-top: 20px;
        }
        .category-account ul li{
            margin-top: 10px;
            list-style-type: none;
            
        }
        .category-account ul li a{
            text-decoration: none;
            font-size: 25px;
            color: black;
           
        }
        .category-account i{
            font-size: 25px;
           
        }
        .content-account{
            float: right;
            width: 80%;
            height: 800px;
            background-color: #FFFFFF;
        }
    </style>
    <header>
        <div class="form_search" id="form_search">
            <form action="" method="post">
                <input type="search" name="search" id="">
                <input type="submit" value="Search">
                <a class="close_form_search" id="close_form_search"><i class="fa-solid fa-xmark"></i></a>
            </form>
        </div>
        <div class="header" id="header">
        <ul>
            <li><img src="https://1000logos.net/wp-content/uploads/2022/08/Uniqlo-logo.png" alt="" srcset=""></li>
            <li><a href="{{route('index.nam')}}">NAM</a></li>
            <li>NỮ</li>
            <li>TRẺ EM</li>
            <li>TRẺ SƠ SINH</li>
            <li id="search"><i class="fa-solid fa-magnifying-glass"></i></li>
            <li><i class="fa-solid fa-cart-shopping"></i></li>
            <li id="account">
                <img src="{{asset('avatar/'.$user[0]->avatar)}}" alt="" srcset="">
                <p>{{$user[0]->user_name}}</p>
                <i class="fa-solid fa-caret-down"></i>
               
            </li>
        </ul>
        
    </div>
    
    <div id="management-account">
        <ul>
            <li><a href="">My account</a></li>
            <li><a href="">Order</a></li>
            <li><a href="">Logout</a></li>
        </ul>
    </header>
    <hr>
    <div class="account">
        <div class="category-account">
            <i class="fa-solid fa-user">      My Account     </i>
            <ul>
                <li><a href="">Profile</a></li>
                <li><a href="">Address</a></li>
                <li><a href="">Edit password</a></li>
                <li><a href="">Bank</a></li>
            </ul>
        </div>
        <div class="content-account">
           
            @yield('content')
        </div>
        </div>
        
    <script>
        var form_search = document.getElementById('form_search');
        var close = document.getElementById('close_form_search');
        var search = document.getElementById('search');
        var header = document.getElementById('header')
        search.onclick = function(e) {
            header.style.display="none";
            form_search.style.display = "block";
        }
        close.onclick = function(e) {
            form_search.style.display = "none";
            header.style.display="block";
            e.preventDefault();
            
        }
        var account = document.getElementById('account');
        var management_account = document.getElementById('management-account');
        account.onclick = function() {
            if(management_account.style.display==="none") {
                management_account.style.display = "block";
            }
            else{
                management_account.style.display = "none";
            }
        }
    </script>
</body>
</html>




