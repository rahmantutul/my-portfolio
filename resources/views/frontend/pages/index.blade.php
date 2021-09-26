@extends('frontend.pages.app')

@section('style')

@endsection

@section('content')
    <!-- gallery section start -->
<section id="gallery">
    <div class="gallery-img">
        <div class="row"  data-aos="fade-up"  data-aos-duration="1000">
            @foreach ($works as $work)
            <div class="col-md-6 main">
                <div class="hover-image">
                    <img class="image" src="{{asset('storage/images/work/'.$work['thumbnail'])}}" alt="">
                </div>
                <a  href="#single" id="showWorkDetails" work_id="{{$work['id']}}"  onclick="show_hide();" class="overlay overlay-top">
                    <div class="text">{{$work['title']}}</div>
                </a>
            </div>
            @endforeach
        </div>
        <section id="single" style="display:none"  data-aos="fade-down"  data-aos-duration="1000">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <div class="hero">
                        <div class="btn-box">
                            <button id="btn1" onclick="openbtn1();"></button>
                            <button id="btn2" onclick="openbtn2();"></button>
                        </div>
                        <div id="content1" class="content">
                            <p id="details1">

                            </p>
                        </div>
                        <div id="content2" class="content">
                            <p id="details2">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="video-wrapper" id="link" style="height: 400px !important">
                    </div>
                </div>
            </div>
        </section>
@stop

@section('javascript')

@endsection
