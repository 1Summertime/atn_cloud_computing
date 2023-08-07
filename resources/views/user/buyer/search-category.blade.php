@extends('layout')
@section('content')
<style>
    body{
    height: auto;
    width: 100%;
    background-color: #F5F5F5;
}
header{
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
header ul li:nth-of-type(5){
    margin-right: 450px;
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
        
        <div class="name">
            <button class="icon"><i class="fa-solid fa-chevron-down"></i></button>
            <h3>Áo</h3>
            
        </div>
       
        <div class="category">
            <ul>
                @foreach($Category_ao as $category_ao)
                <li><a href="{{route('search.category', $category_ao->id)}}">{{$category_ao->name}}</a></li>
                @endforeach
            </ul>
            </div>
            <div class="name">
                <button class="icon"><i class="fa-solid fa-chevron-down"></i></button>
                <h3>Quần</h3>
                
            </div>
           
            <div class="category">
            <ul>
                @foreach($Category_quan as $category_quan)
                <li><a href="{{route('search.category', $category_quan->id)}}">{{$category_quan->name}}</a></li>
                @endforeach
            </ul>
            </div>
            <div class="name">
                <button class="icon"><i class="fa-solid fa-chevron-down"></i></button>
                <h3>Đồ Mặc Nhà</h3>
                
            </div>
           
            <div class="category">
            <ul>
                @foreach($Category_nha as $category_nha)
                <li><a href="{{route('search.category', $category_nha->id)}}">{{$category_nha->name}}</a></li>
                @endforeach
            </ul>
            </div>
            <div class="name">
                <button class="icon"><i class="fa-solid fa-chevron-down"></i></button>
                <h3>Đồ Mặc Ngoài</h3>
                
            </div>
           
            <div class="category">
            <ul>
                @foreach($Category_ngoai as $category_ngoai)
                <li><a href="{{route('search.category', $category_ngoai->id)}}">{{$category_ngoai->name}}</a></li>
                @endforeach
            </ul>
            </div>
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