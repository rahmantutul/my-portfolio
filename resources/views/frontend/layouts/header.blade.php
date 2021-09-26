<!-- navbar Start -->
<nav class="navbar navbar-expand-md fixed-top pt-0 pb-0 my-0 " data-aos="fade-down"  data-aos="fade-left"  data-aos-duration="1000">
    <a href="index.html" class="navbar-brand"><img class="navbar-img" height="70px" width="110px" src="{{asset('storage/images/logo/'.$image->header_logo)}}" alt="Broker" srcset=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="toggler-icon"><img class="bar-icon" src="{{asset('assets/frontend/img/icon8.png')}}" alt=""></span>
    </button>
    <div class="collapse navbar-collapse bar" id="navbarResponsive">
        <ul class="navbar-nav m-auto links">
            <li class="nav-item"><a href="#banner" class="nav-link">ABOUT US</a></li>
            <li class="nav-item"><a href="#gallery" class="nav-link">OUR WORK</a></li>
            <li class="nav-item"><a href="#contact" class="nav-link">CONTACT</a></li>
        </ul>
        <ul class="navbar-nav social-icon icons">
            <li class="nav-item"><a href="{{$link->vimeo}}" class="nav-link" target="blank"><i class="fab fa-vimeo-square"></i></a></li>
            <li class="nav-item"><a href="{{$link->facebook}}" class="nav-link" target="blank"><i class="fab fa-facebook-f"></i></a></li>
            <li class="nav-item"><a href="{{$link->tweeter}}" class="nav-link" target="blank"><i class="fab fa-twitter-square"></i></a></li>
            <li class="nav-item"><a href="{{$link->instagram}}" class="nav-link" target="blank"><i class="fab fa-behance-square"></i></a></li>
            <li class="nav-item"><a href="{{$link->linkedIn}}" class="nav-link" target="blank"><i class="fab fa-linkedin"></i></a></li>
        </ul>
    </div>
</nav>
