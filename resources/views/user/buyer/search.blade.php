@extends('layout')
@section('content')
<style>
    .product{
        height: 500px;
        width: 350px;
        padding-left: 50px;
        cursor: pointer;
        display: inline-table;
        color: black;
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
        font-size: 20px;
        color: red;
    }
</style>
<h1>Kêt quả tìm kiếm: {{$condition}}</h1>
<div class="products">
    @foreach($Product as $product)
    <a href="{{route('product.detail', $product->id)}}">
    <div class="product">
        <img src="{{asset('product/image/'.$image[0]->path)}}" alt=""><br>
        <h2>{{$product->name}}</h2>
        <h3>Price: {{$product->price}}$</h3>
        <p>{{$product->description}}</p>
    </div>
    </a>
    @endforeach
</div>



@endsection