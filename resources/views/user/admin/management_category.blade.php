@extends('layout.admin-layout');
@section('content')

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Category</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                   
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="align-middle text-center text-sm"> 
                        <span class="badge badge-sm bg-gradient-success"> <a href=""> Edit</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href=""> Delete</a></span>
                        <span class="badge badge-sm bg-gradient-success"> <a href="{{route('create.category')}}">Create</a></span></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  @foreach($Category as $category)
                  <tbody>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$category->id}}</span>
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" >{{$category->name}}</span>
                        
                      </td>
                    
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"> <a href="{{route('edit.category', $category->id)}}"> Edit</a></span>
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