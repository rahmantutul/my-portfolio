
<div class="container-fluid" id="contact">
    <div class="row">
        <div class="col-md-6 mt-2"   data-aos="fade-up"  data-aos-duration="1500">
            <div class="contact-1">
                @if (!empty($meet->image))
                 <img class="contact-img mb-5" style="height: 350px !important; width:400px !important; margin-top:60px" src="{{asset('storage/images/meet/'.$meet->image)}}" alt="">
                @endif
            </div>
        </div>
        <div class="col-md-6 mt-5"   data-aos="fade-down"  data-aos-duration="1500">
            <div class="contact-2">
                <ul class="nav nav-tabs nav-justified section">
                    <li class="nav-item active">
                        <a href="#section-one" class="nav-link text-white " data-toggle="tab">{{$meet->heading1}}</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#section-two" class="nav-link text-white" data-toggle="tab">{{$meet->heading2}}</a>
                    </li>
                </ul>
                <div class="tab-content container">
                    <div class="tab-pane mt-5 active" id="section-one">
                        <p>
                         {{$meet->details1}}
                        </p>
                    </div>

                    <div class="tab-pane mt-5" id="section-two">
                        <p  data-aos="fade-left"  data-aos-duration="1000">
                            {{$meet->details2}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
