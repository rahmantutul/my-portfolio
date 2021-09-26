<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeti | Moving picture</title>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/aos.css')}}">

</head>
<body data-spy="scroll" data-target="#navbarResponsive">
 <div class="home">
   @include('frontend.layouts.header')
<!-- navbar end -->
   @include('frontend.layouts.banner')
<!-- Banner section end -->
   @include('frontend.layouts.seen')

   @include('frontend.layouts.parallax')

   @include('frontend.layouts.contact')

   @yield('content')
</div>
@if (!empty($work))
<div class="button text-center">
    <button class="load-more"><i class="fas fa-arrow-alt-circle-down"></i><span>MORE WORK</span></button>
</div>
@endif




<!-- Gallery section end -->

<section id="google-map">
    <div class="container-fluid">
         <div class="map">
           {!!$link->googleMap!!}
         </div>
    </div>
</section>


@include('frontend.layouts.footer')

<!-- JS, Popper.js, and jQuery -->

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{asset('assets/frontend/js/ajax.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"crossorigin="anonymous"></script>
<script src="{{asset('assets/frontend/js/parallax.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/all.min.js')}}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init();
</script>

<script src="{{asset('assets/frontend/js/style.js')}}"></script>
</body>
</html>
