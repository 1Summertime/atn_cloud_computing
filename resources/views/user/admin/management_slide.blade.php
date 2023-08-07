@extends('layout.admin-layout');
@section('content')
<style>
    .slide img{
        height: 100px;
        width: 200px;
    }
</style>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Slide 1</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                        <th>Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="align-middle text-center text-sm"> 
                      
                        <span class="badge badge-sm bg-gradient-success"> <a href="{{route('slide.create')}}">Create</a></span></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  @foreach($Slide1 as $slide1)
                  <tbody>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$slide1->id}}</span>
                      </td>
                        <td>
                            <img src="{{asset('slide/image/'.$slide1->slide)}}" alt="" srcset="" style="width: 200px; height: 150px;">
                          
                        </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" >{{$slide1->description}}</span>
                        
                      </td>
                    
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"> <a href="{{route('edit.category', $slide1->id)}}"> Edit</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href=""> Delete</a></span>
                        
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
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Slide 2</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                        <th>Image</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                        <th class="align-middle text-center text-sm"> 
                          
                          <span class="badge badge-sm bg-gradient-success"> <a href="{{route('create.category')}}">Create</a></span></th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    @foreach($Slide2 as $slide2)
                    <tbody>
                      <tr>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{$slide2->id}}</span>
                        </td>
                        <td>
                            <div class="slide">
                            <img src="{{asset('slide/image/'.$slide2->slide)}}" alt="" srcset=""></td>
                        </div>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" >{{$slide2->description}}</span>
                          
                        </td>
                      
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success"> <a href="{{route('edit.category', $slide2->id)}}"> Edit</a></span>
                          <span class="badge badge-sm bg-gradient-success"> <a href=""> Delete</a></span>
                          <span class="badge badge-sm bg-gradient-success"> <a href="{{route('create.category')}}">Create</a></span>
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
        <div class="container-fluid py-4">
            <div class="row">
              <div class="col-12">
                <div class="card my-4">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3">Slide 3</h6>
                    </div>
                  </div>
                  <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                         
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="align-middle text-center text-sm"> 
                            
                              <span class="badge badge-sm bg-gradient-success"> <a href="{{route('create.category')}}">Create</a></span></th>
                            <th class="text-secondary opacity-7"></th>
                          </tr>
                        </thead>
                        @foreach($Slide3 as $slide3)
                        <tbody>
                          <tr>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{$slide3->id}}</span>
                            </td>
                            <td style="height: 100px; width:100px"><img src="{{asset('slide/image/'.$slide3->slide)}}" alt="" srcset=""></td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" >{{$slide3->description}}</span>
                              
                            </td>
                          
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success"> <a href="{{route('edit.category', $slide3->id)}}"> Edit</a></span>
                              <span class="badge badge-sm bg-gradient-success"> <a href=""> Delete</a></span>
                              <span class="badge badge-sm bg-gradient-success"> <a href="{{route('create.category')}}">Create</a></span>
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
@endsection