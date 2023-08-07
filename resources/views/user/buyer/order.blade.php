@extends('layout')
@section('content')
    <style>
        .image img{
            height: 100px;

        }
        .image{
            font-size: 20px;
        }
        .cancel{
            height: 30px;
            width: 100px;
            font-size: 20px;
            background-color: greenyellow;
            margin-left: 90px;
            cursor: pointer;
            border-radius: 10%;
        }
        .status-delivery{
            height:50px;
            width: 110px;
            font-size: 20px;
            background-color: greenyellow;
            margin-left: 90px;
            margin-top: 0px;
            border-radius: 10%;
        }
        .form-buy{
            height: 450px;
            width: 500px;
            background-color: bisque;
            position: relative;
            margin-left: 800px;
            display: none;
            border-radius: 25px;
        }
        .form-buy label{
            font-size: 25px;
            margin-top: 5px;
            margin-left: 20px;
        }
       
        .form-buy input[type="text"]{
            height: 30px;
            width: 300px;
            font-size: 25px;
            margin-top: 10px;
            margin-left: 20px;
        }
        .form-buy input[type="textarea"]{
            height: 80px;
            width: 300px;
            font-size: 15px;
            margin-left: 20px;
        }
        .form-buy input[type="submit"]{
            font-size: 20px;
            margin-left: 380px;
            height: 35px;
            width: 100px;
            background-color: antiquewhite;
            cursor: pointer ;
        }
        .close{
            margin-left: 450px;
            font-size: 20px;
            margin-top: 10px;
            cursor: pointer;
        }
        .edit{
            height: 30px;
            width: 100px;
            font-size: 20px;
            background-color: greenyellow;
            margin-left: 90px;
            cursor: pointer;
            margin-top: 5px; 
            border-radius: 10%;
        }
    </style>
    <hr>
       <table>
        <tr>
            <th style="width:500px; text-align:center;font-size:30px ">Product</th>
            <th style="width:300px; font-size:30px">Price</th>
            <th style="width:300px; font-size:30px">Amount</th>
            <th style="width:300px; font-size:30px">Total</th>
            <th style="width:300px; font-size:30px">Status delivery</th>
            <th style="width:300px; font-size:30px">Number</th>
            <th style="width:300px; font-size:30px">Address</th>
            <th style="width:300px; font-size:30px">Action</th>
        </tr>
        @forEach($Order as $order)
        
        <tr>
            <td>
                @foreach($order->order_detail as $order_details)
                <div class="image">
                    
                    <img src="{{asset('product/image/'.$order_details->product->image[0]->path)}}" alt="">
                    <p>{{$order_details->product->name}}</p>
                    
                   
                </div>
               
            </td>
            <td style="text-align:center; font-size:20px;">{{$order_details->product->price}}$</td>
            <td style="text-align:center; font-size:20px;">{{$order_details->amount}}</td>
            <td style="text-align:center; font-size:20px;">{{$order_details->total}}$</td>
            <td style="text-align:center; font-size:20px;">
                @endforeach
                <div class="status-delivery">
                    {{$order->status_delivery}}
                </div>
            </td>
            <td style="text-align:center; font-size:20px;">0{{$order->number}}</td>
            <td style="text-align:center; font-size:20px;">{{$order->address}}</td>
            <td style="text-align:center; font-size:20px;;">
                <div class="cancel">Cancel
                </div>
                <div class="edit">Edit
                </div>
            
        </tr>
        
    @endforeach
            
      
    
@endsection