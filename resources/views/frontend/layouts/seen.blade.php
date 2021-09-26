<section id="seen">
    <div class="container">
        <div class="row mt-0">
            <div class="col-md-6"  data-aos="fade-right" data-aos-duration="1000">
                <div class="seen-1" >
                    <img class="seen-img" style="height:300px !important; width:450px !important; margin-bottom:50px" src="{{asset('storage/images/seen/'.$seen->image)}}" alt="" srcset="">
                </div>
            </div>
            <div class="col-md-6"  data-aos="fade-left"data-aos-duration="1000">
                <div class="seen-2">
                    <p class="seen-details">
                        {{$seen->details}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
