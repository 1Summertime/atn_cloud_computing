@extends('layout')
@section('content')
    <style>
        .image img{
            height: 100px;

        }
        .image{
            font-size: 20px;
        }
        .buy{
            height: 30px;
            width: 100px;
            font-size: 20px;
            background-color: greenyellow;
            margin-left: 110px;
            cursor: pointer;
            border-radius: 10%;
        }
        #delete{
            height:30px;
            width: 100px;
            font-size: 20px;
            background-color: greenyellow;
            margin-left: 110px;
            margin-top: 10px;
            border-radius: 10%;
        }
        #edit{
            height:30px;
            width: 100px;
            font-size: 20px;
            background-color: greenyellow;
            margin-left: 110px;
            margin-top: 10px;
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
    </style>
    <hr>
       <table>
        <tr>
            <th style="width:500px; text-align:center;font-size:30px ">Product</th>
            <th style="width:300px; font-size:30px">Price</th>
            <th style="width:300px; font-size:30px">Amount</th>
            <th style="width:300px; font-size:30px">Total</th>
            <th style="width:300px; font-size:30px">Action</th>
        </tr>
        @forEach($Order_detail as $order_detail)
        <tr>
            <td>
                <div class="image">
                    <img src="{{asset('product/image/'.$order_detail->product->image[0]->path)}}" alt="">
                    <p>{{$order_detail->product->name}}</p>
                   
                </div>
               
            </td>
            <td style="text-align:center; font-size:20px;">{{$order_detail->product->price}}$</td>
            <td style="text-align:center; font-size:20px;">{{$order_detail->amount}}</td>
            <td style="text-align:center; font-size:20px;">{{$order_detail->total}}$</td>
            <td style="text-align:center; font-size:20px;;">
                <div class="buy">Buy
                </div>
            <div id="delete"><a style="text-decoration: none;cursor: pointer;" href="">Delete</a></div>
        

            <div id="edit"><a style="text-decoration: none;cursor: pointer;" href="">Edit</a></div></td>
            
        </tr>
        @endforeach
       </table>
       @forEach($Order_detail as $order_detail)
       <div class="form-buy" id="form-buy">
       <button style="border: 0;" class="close"> <i id="close" class="fa-solid fa-xmark"></i> </button>
        <form action="{{route('product.order')}}" method="post">
            @csrf
            <div>
                <label for="full-name">Full name</label><br>
                <input type="text" name="full_name" id="">
            </div>
            <div>
                <label for="address">Address</label><br>
                <input type="text" name="address" id="">
            </div>
            <div>
                <label for="number">Number</label><br>
                <input type="text" name="number" id="">
            </div>
            <div>
                <label for="note">Note</label> <br>
                <input type="textarea" name="note" id="">
            </div>
            <input type="hidden" name="order_detail" value="{{$order_detail->id}}">
            <input type="submit" value="Order">
        </form>
       </div>
       @endforeach
    <script>
        var buys = document.querySelectorAll('.buy');
        var form = document.querySelectorAll('.form-buy');
        var closes = document.querySelectorAll('.close');
        console.log(buys);
        console.log(form);
        console.log(closes);
        buys.forEach((buy, index)=> {
        buy.onclick = function(e) {
            form[index].style.display = "block";
        }
         });
        closes.forEach((close, index)=> {
        close.onclick = function() {
            form[index].style.display = "none";
        }
         });
    </script>
@endsection