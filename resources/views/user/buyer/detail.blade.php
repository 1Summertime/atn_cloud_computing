@extends('layout')
@section('content')
<style>
    .Images{
        height: auto;
        width: 50%;
        float: left;
       
        display: block;
    }
    .image{
        height: 700px;
        width: 20%;
        float: left;
        margin-left: 30px;
    }
    .image img{
        height: 80px;
        width: 75px;
        padding: 5px 5px 5px 5px ;
        
    }
    .showSlideDetail{
        height: 700px;
        width: 65%;
        float: right;
        padding-top: 10px;
        margin-right: 20px;
        position: relative;
    }
    .showSlideDetail .slideDetail{
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: none;
    }
    .showSlideDetail .slideDetail  img{
        height: 100%;
        width: 100%;
        
    }
    .image-index{
        display: inline-block;
    }
    .next{
        position: absolute;
        top: 45%;
        right: 5%;
        height: 50px;
        width: 45px;
        cursor: pointer;
        border-radius: 50%; 
    }
    .prev{
        position: absolute;
        top: 45%;
        left: 5%;
        height: 50px;
        width: 45px;
        cursor: pointer;
        border-radius: 50%; 
    }
    .fa-solid{
        font-size: 30px;
    }
    
   
    .information{
        height: 1000px;
        width: 40%;
        float: right;
        
    }
    .add-cart{
        margin-top: 20px;
        font-size: 30px;
        height: 45px;
        width: 800px;
        background-color: antiquewhite;
        cursor: pointer;
    }
    .add-cart a{
        text-decoration: none;
        color: black;
    }
    .active-slide{
        display: block;

    }
    .active-image{
        border: 3px solid black;
    }
    .slideDetail.active-slide {
        display: block;
    }

    body{
        height: auto;
        width: 100%;
      background-color: #F5F5F5;
     }
        .header{
            height: 100px;
            width: 100%;
            margin-top: 20px;
        }
        .header ul {
            display: flex;
            align-items: center;
        }
        .header ul li img{
            width: 150px;
            height: 100px;
            margin-left: 100px;
            
        }
        .header ul li {
            list-style-type: none;
            display: inline-flex;
            font-size: 35px;
            margin-left: 50px;
            font-weight: bold;
            cursor: pointer;
        }
        .header ul li a{
            text-decoration: none;
            color: black;
        }
        .header ul li:nth-of-type(2){
            margin-right: 950px;
        }

        #account{
            width: 350px;
            height: 100px;
            position: relative;
            margin-left: 0;
            cursor: pointer;
        }
        #account i{
            margin-top: 40px;
            padding-left: 10px;
        }
        #account img{
            width: 50px;
            height: 50px;
            padding-right: 10px;
            margin-top: 30px;
            border-radius: 50%;
        }
        #account p{
            padding: auto;
        }
        .icon{
            position: absolute;
            margin-left: 30px;
            bottom: 20%;
        }
        .icon i{
            font-size: 10px;
            padding-bottom: 5px;
        }
        .order-detail{
            background: #F5F5F5;
            margin-top: 450px;
            margin-left: 1000px;
            width: 300px;
            height: 200px;
            position: relative;
            border: 1px solid black;
            display: none;
        }

        .order-detail label{
            font-size: 25px;
            margin-left: -90px;
        }
        .order-detail input[type="number"]{
            margin-top: 50px;
            height: 30px;
            font-size: 15px;
        }
        .order-detail input[type="submit"]{
            margin-top: 15px;
            font-size: 20px;
            
        }
        .order-detail i{
            margin-left: 150px;
            cursor: pointer;
        }
        .form_search{
            display: none;
            margin-top: 20px;
        }
        .form_search input[type="search"]{
            height: 35px;
            width: 950px;
            margin-left: 600px;
            position: relative;
        
        }
        .form_search input[type="submit"]{
            height: 35px;
            width: 90px;
            cursor: pointer;
        }
        .close_form_search{
            border: 0;
            position: absolute;
            margin-top: 1px;
            margin-left: 5px;
            cursor: pointer;
        }
        .close_form_search i{
            font-size: 35px;
        
        }
        #management-account{
            height: 150px;
            width: 200px;
            position: absolute;
            right: 0;
            background-color: #F5F5F5;
            margin-right: 225px;
            top:0;
            margin-top: 100px;
            border-radius: 25%;
            display: none;
        }
        #management-account a{
            text-decoration: none;
            font-size: 25px;
            color: black;
        }
        #management-account ul li{
            list-style-type: none;
            padding-bottom: 10px;
        }
        .comment{
            width: 100%;
            height: auto;
            margin-top: 800px;
            margin-left: 100px
        }
        .comment h1{
            font-size: 45px;
            color: red;
        }
        .comment input[type="text"]{
            border: 0;
            height: 80px;
            width: 1100px;
            border-radius: 2%; 
            font-size: 20px;
        }
        .sent-comment{
            margin-left: -50px;
            border: 0;
            cursor: pointer;
        }
        .comment img{
            height: 50px;
            width: 50px;
            border-radius: 50%;
            padding-bottom: 10px;
            padding-right: 5px; 
            position: relative;
        }
        .account-comment{
            display: inline;
            font-size: 25px;
            position: absolute;
            margin-top: 2px;
        }
        .show-comment{
            padding-top: 20px;
        }
</style>
<div class="detail">
    <div class="Images">
        <div class="showSlideDetail">
            @forEach($product->image as $image)
            <div class="slideDetail">
                <img src="{{asset('product/image/'.$image->path)}}" alt="" srcset="">
            </div>
            @endforeach
          
            <button class="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button class="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
        <div class="image">
            @forEach($product->image as $image)
            <div class="image-index">
            <img src="{{asset('product/image/'.$image->path)}}" alt="1">
            </div>
            @endforeach
            
        </div>
        <div class="comment">
            <h1>Comment</h1>
            <img src="{{asset('avatar/'.$user[0]->avatar)}}" alt="" srcset="" >
            <p class="account-comment">{{$user[0]->user_name}}</p>
            <form action="{{route('product.feedback')}}" method="post">
                @csrf
                <input type="text" name="comment" id="">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button type="submit" class="sent-comment"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
            @foreach($product->feedback as $feedback)
            <div class="show-comment">
                <img src="{{asset('avatar/'.$feedback->user->avatar)}}" alt="" srcset="" >
                <p class="account-comment">{{$feedback->user->user_name}}</p>
                <p>{{$feedback->comment}}</p>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
    
    <div class="information">
        <h1 style="font-size: 50px">{{$product->name}}</h1>
        <h2 style="font-size: 45px; color:red">Price: {{$product->price}}.00$</h2>
        <p style="font-size: 25px; color:red">{{$product->description}}</p>
        <p style="font-size: 25px; color:black">Color: {{$product->color}}</p>
        <p style="font-size: 25px; color:black">Brand: {{$product->brand}}</p>
        <hr>
        
    <button class="add-cart" id="add">Add to cart</button>
    
    
    </div>
</div>

<div class="background">
    <div class="order-detail" id="order-detail">

        <i id="close" class="fa-solid fa-xmark"></i>
        <form action="{{route('product.cart')}}" method="POST">
            @csrf
            <div>
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="">
            </div>
            <input type="hidden" name="product_id", value="{{$product->id}}">
            <input type="hidden" name="price" value="{{$product->price}}">
            <input type="submit" value="Add">
        </form>
    </div>
</div>

<script>
    var currentSlide = 0;
    var slides_detail = document.querySelectorAll('.slideDetail');
    var image = document.querySelectorAll('.image img');
    console.log(slides_detail);
function showSlide(n) {
  slides_detail[currentSlide].classList.remove('active-slide');
  image[currentSlide].classList.remove('active-image');
  currentSlide = (n + slides_detail.length) % slides_detail.length;
  slides_detail[currentSlide].classList.add('active-slide');
  image[currentSlide].classList.add('active-image');
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function previousSlide() {
  showSlide(currentSlide - 1);
}

// Tự động chuyển slide sau một khoảng thời gian
// setInterval(nextSlide, 5000);

// Đăng ký sự kiện cho các nút next và previous
var next = document.querySelectorAll('.next');
var prve = document.querySelectorAll('.prev');
console.log(next);
console.log(prve);
next.forEach((nexts, index)=>{

  nexts.onclick = function() {
    
    nextSlide();
  }
});
prve.forEach( function(prves) {
  prves.onclick = function() {
   
    previousSlide();
  }
});
// Hiển thị slide đầu tiên khi trang được tải
showSlide(currentSlide);
var add_cart = document.getElementById('add');
console.log(add_cart);
var order_detail = document.getElementById("order-detail");
console.log(order_detail)
var close = document.getElementById('close');
add_cart.onclick = function(e) {
    order_detail.style.display = "block"
}
close.onclick = function() {
    order_detail.style.display = "none"

}

</script>
@endsection