@extends('user.guest.layout')
@section('content')
<style>
    .menu{
        height: auto;
        width: 100%;
        margin-top: 50px;
        display: block;
    }
    .type{
        float: left;
        width: 20%;
        height: auto;
    }
    .products{
        float: right;
        width: 75%;
        height: auto;
       
        
    }
    .category{
        display: none;
    }
    .type .category ul li{
        list-style: none;
        padding-bottom: 10px;
        
    }
    .type .category ul li a{
        text-decoration: none;
        font-size: 25px;
        color: black;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        margin-left: 50px;
    }
    .product{
        height: 500px;
        width: 350px;
        padding-left: 50px;
        cursor: pointer;
        display: inline-table;
        color: black;
        padding-bottom: 30px;
    }
    .product img{
        height: 350px;
        width: 350px;
    }
    .product h3{
        font-size: 35px;
        font-weight: bold;
        color: red;
    }
    .product p{
        font-size: 25px;
        color: red;
        display: inline;
        padding-right: 50px; 
    }

    .type .name .icon{
        
        margin-left: 300px;
        border: 0;
        font-size: 20px;
        
    }
    .type .name .icon i{
        font-size: 20px;
    }
    .type .name{
        height: 50px;
        width: 300px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 35px;    
        margin-left: 50px; 
        padding: 0;
        position: relative;
        cursor: pointer;
    }
    .product h2{
        height: 40px;
    }
</style>

<div class="menu">
    <div class="type">
        @forEach($Category as $category)
        <div class="name">
            <button class="icon"><i class="fa-solid fa-chevron-down"></i></button>
            <h3>{{$category->name}}</h3>
        
        </div>
       @endforeach
       
    </div>
    </div>
    <div class="products">
        @foreach($Product as $product)
        <a href="{{route('product.detail', $product->id)}}">
        <div class="product">
            <img src="{{asset('product/image/'.$product->image[0]->path)}}" alt=""><br>

            <h2>{{$product->name}}</h2>
            <h3>Price: {{$product->price}}$</h3>
            <p>Color: {{$product->color}}</p>
            <p>Brand: {{$product->brand}}</p>
        </div>
        </a>
        @endforeach
    </div>
</div>
<script>
    var name1s = document.querySelectorAll('.name');
    
    var category = document.querySelectorAll('.category');
    
    name1s.forEach((name1, index)=> {
        name1.onclick = function(e) {
            
            if(category[index].style.display==="none"){
                category[index].style.display="block";
            }
            else{
                category[index].style.display="none";
            }
        }
    })
</script>
@endsection