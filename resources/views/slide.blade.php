@extends('layout');
@section('content')
{{-- <div class="slideshow-container">
    <div class="slide">
      <img src="phat.jpg" alt="Slide 1">
    </div>
    <div class="slide">
      <img src="slide2.jpg" alt="Slide 2">
    </div>
    <div class="slide">
      <img src="slide3.jpg" alt="Slide 3">
    </div>
    <button class="prevBtn"><i class="fa-solid fa-angle-left"></i></button>
    <button class="nextBtn"><i class="fa-solid fa-angle-right"></i></button>
  </div> --}}
  {{-- <div class="slideshow-container">
    <div class="slide">
      <img src="phat.jpg" alt="Slide 1">
    </div>
    <div class="slide">
      <img src="slide2.jpg" alt="Slide 2">
    </div>
    <div class="slide">
      <img src="slide3.jpg" alt="Slide 3">
    </div>
    <button class="prevBtn"><i class="fa-solid fa-angle-left"></i></button>
  <button class="nextBtn"><i class="fa-solid fa-angle-right"></i></button>
  </div> --}}
   

    <div class="slideshow-containerheight">
      <div class="slideshow-container active" >
        @foreach($Slide1 as $slide1)
        <div class="slide">
          <img src="{{asset('slide/image/'.$slide1->slide)}}" alt="Slide 1">
        </div>
        @endforeach
       
        <button class="prevBtn"><i class="fa-solid fa-angle-left"></i></button>
        <button class="nextBtn"><i class="fa-solid fa-angle-right"></i></button>
      </div>

      <div class="slideshow-container">
        @foreach($Slide2 as $slide2)
        <div class="slide">
          <img src="{{asset('slide/image/'.$slide2->slide)}}" alt="Slide 1">
        </div>
        @endforeach
        <button class="prevBtn"><i class="fa-solid fa-angle-left"></i></button>
        <button class="nextBtn"><i class="fa-solid fa-angle-right"></i></button>
      </div>
      <div class="icon">
        <i class="fa-regular fa-circle"></i><br>

        <i class="fa-regular fa-circle"></i><br>
        <i class="fa-regular fa-circle"></i><br>
        <i class="fa-regular fa-circle"></i>
      </div>
    </div>
  <script src="slide.js"></script>
  
@endsection