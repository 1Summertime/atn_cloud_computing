@extends('layout.admin-layout');
@section('content')

    <!-- End Navbar -->
    <style>
      .edit_image{
        background-color: aliceblue;
        height: 650px;
        display: block;
        width: 1000px;
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">>Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">>Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quanity</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Color</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  @foreach($Product as $product)
                  <tbody>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$product->id}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex px-2 py-1">
                          <div>
                            {{-- <img src="{{asset('product/image/'.$product->image[1]->path)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> --}}
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"> <a href="" class="edit"> Edit</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href=""> Delete</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href="">Add</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href="" class="view"> View</a></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" >{{$product->quanity}}</span>
                      </td>
                     <td>
                      {{$product->brand}}
                     </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$product->color}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$product->gender}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$product->category->name}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$product->description}}</span>
                      </td>
                    
                       <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"> <a href="{{route('edit.product', $product->id)}}"> Edit</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href=""> Delete</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href="{{route('create.product')}}">Create</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href=""> View</a></span>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
       @foreach($Product as $product1)
      <div class="view_image">
        <div class="icon_view">
          <i class="fa-solid fa-xmark"></i>
        </div>
        @foreach($product1->image as $image)
        <div class="image">
          <img src="{{asset('product/image/'.$image->path)}}" alt="" srcset="">
        </div>
        @endforeach
      </div>
      
      <div class="edit_image">
        <div class="icon_edit">
          <i class="fa-solid fa-xmark"></i>
        </div>
        @foreach($product1->image as $image)
        <div class="image">
          <form action="{{route('update.image', $image->id)}}" method="post" enctype="multipart/form-data">
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
          <img src="{{asset('product/image/'.$image->path)}}" alt="" srcset=""> <br>
          <input type="file" name="image" id=""> <br>
          <input type="submit" value="Save Change">
        </div>
        </form>
        @endforeach
      </div>
      @endforeach 
       <script>
        var Edits = document.querySelectorAll('.edit');
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
        Views.forEach((view, index) => {
          view.onclick = function(e) {
            e.preventDefault();
            View_images[index].style.display = "block";          
          }
        });
        Icons_views.forEach((icon, index) => {
          icon.onclick = function(e) {
            View_images[index].style.display = "none";
          }
        });
      </script>
@endsection