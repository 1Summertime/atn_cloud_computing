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
        <div class="form_search" id="form_search">
            <form action="{{route('product.search')}}" method="get">
                <input type="search" name="search" id="">
                <input type="submit" value="Search">
                <a class="close_form_search" id="close_form_search"><i class="fa-solid fa-xmark"></i></a>
            </form>
        </div>
        <div class="header" id="header">
        <ul>
            <li><a href="{{route('slide.index')}}"><img src="https://1000logos.net/wp-content/uploads/2022/08/Uniqlo-logo.png" alt="" srcset="" ></a></li>
            <li><a href="{{route('index.nam')}}">HOME</a></li>
          
            <li id="search"><i class="fa-solid fa-magnifying-glass"></i></li>
            <li><a href="{{route('index.cart')}}"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <li >
                <a href="{{route('showLogin')}}">Sign In</a>
               
            </li>
        </ul>
        
    </div>
    
    <div id="management-account">
        <ul>
            <li><a href="{{route('profile')}}">My account</a></li>
            <li><a href="{{route('index.order')}}">Order</a></li>
            <li><a href="{{route('logout')}}">Login</a></li>
        </ul>
    </header>
    <hr>
    
        @yield('content');
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