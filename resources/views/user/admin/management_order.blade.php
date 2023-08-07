@extends('layout.admin-layout');
@section('content')

    <!-- End Navbar -->
    <style>
      .edit_image{
        background-color: aliceblue;
        height: 150px;
        display: block;
        width: 500px;
        left: 25%;
        top: 25%;
        display: none;
        position: relative;
        
      }
      .edit_image input[type="submit"]{
        margin-bottom: 50px;
      }
      .view_image{
        background-color: aliceblue;
        height: 500px;
        display: block;
        width: 900px;
        left: 25%;
        top: 25%;
        position: relative;
        display: none;
      }
      .fa-solid {
        position: absolute;
        right: 0;
        margin-top: 10px;
        margin-right: 10px;
        font-size: 25px;
        cursor: pointer;
      }
      .image img{
        
        height: 200px;
        width: 250px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 20px; 
      }
      .image{
        display: inline-block;
      }
      .image input[type="file"], input[type="submit"]{
        margin-left: 20px;
        margin-bottom: 10px;
      }
    </style>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">>Product</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">>Status delivery</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                     
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  @foreach($Order as $order)
                  <tbody>
                    <tr>
                        @foreach($order->order_detail as $order_details)
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$order->id}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset('product/image/'.$order_details->product->image[0]->path)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$order_details->product->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"> <a href="" class="edit">  {{$order->status_delivery}}</a></span>
                       
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" >{{$order_details->product->price}}$</span>
                      </td>
                     <td>
                        {{$order_details->amount}}<
                     </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$order_details->total}}$</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">0{{$order->number}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$order->address}}</span>
                      </td>
                   
                       <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"> <a href="{{route('edit.product', $order->id)}}"> Edit</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href=""> Delete</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href="" class="delivery"> Delivery status adjustment</a></span>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="edit_image">
        <div class="icon_edit">
          <i class="fa-solid fa-xmark"></i>
        </div>
        @foreach($Order as $order)
        <div class="image">
          <form action="{{route('delivery.order', $order->id)}}" method="post" enctype="multipart/form-data">
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
            @csrf   
            <input type="radio" id="option1" name="status" value="Awaiting confirmation">
            <label for="option1">Awaiting confirmation</label>
            
            <input type="radio" id="option2" name="status" value="Delivering">
            <label for="option2">Delivering</label>

            <input type="radio" id="option2" name="status" value="Received">
            <label for="option2">Received</label>
          <input type="submit" value="Save Change">
        </div>
        </form> 
        @endforeach
      </div>
     
      <script>
        var Edits = document.querySelectorAll('.delivery');
        var Views = document.querySelectorAll('.view');
        var Edit_images = document.querySelectorAll('.edit_image');
        var View_images = document.querySelectorAll('.view_image')
        var Icons_edits = document.querySelectorAll('.icon_edit');
        var Icons_views = document.querySelectorAll('.icon_view');
        console.log(Edits);
        console.log(Edit_images);
        Edits.forEach((edit, index) => {
          edit.onclick = function(e) {
            e.preventDefault();
            Edit_images[index].style.display = "block";          
          }
        });
        Icons_edits.forEach((icon_edit, index) => {
          icon_edit.onclick = function(e) {
            Edit_images[index].style.display = "none";
          }
        });
        // Views.forEach((view, index) => {
        //   view.onclick = function(e) {
        //     e.preventDefault();
        //     View_images[index].style.display = "block";          
        //   }
        // });
        // Icons_views.forEach((icon, index) => {
        //   icon.onclick = function(e) {
        //     View_images[index].style.display = "none";
        //   }
        // });
      </script>
      
@endsection