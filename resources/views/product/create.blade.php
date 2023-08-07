@extends('auth.layout');
@section('content');
<main class="main-content  mt-0">
  
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="card-body">
                <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
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
                    <h1 style="text-align: center">Create Product</h1>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Quanity</label>
                    <input type="text" class="form-control" name="quanity">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Brand</label>
                    <input type="text" class="form-control" name="brand">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Color</label>
                    <input type="text" class="form-control" name="color">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Gender</label>
                    <input type="text" class="form-control" name="gender">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    
                    <select class="form-control" name="category" >
                      <option value="" disabled selected hidden>Category</option>
                      <option value=""></option>
                      @foreach ($Category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>                          
                      @endforeach
                    </select>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Description</label>
                    <input type="textarea" class="form-control" name="description">
                  </div>
                  <div>
                    <input type="hidden" name="user" value="1">
                  </div>
                  <div>
                    <input type="file" name="image[]" id="" multiple>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Submit</button>
                  </div>
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
@endsection;