@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-md-7 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit your logo section</h4>
        <form class="forms-sample" action="{{url('admin/logo/edit/'.$logoInfo['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Header Logo</label>
                <div class="col-sm-9">
                <input type="file" name="header_logo" class="form-control" required>
                <img class="mt-4" height="80px" width="80px" src="{{asset('storage/images/logo/'.$logoInfo['header_logo'])}}" alt="" srcset="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Parallax Image</label>
                <div class="col-sm-9">
                <input type="file" name="parallax" class="form-control" required>
                <img class="mt-4" height="80px" width="80px" src="{{asset('storage/images/logo/'.$logoInfo['parallax'])}}" alt="" srcset="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Footer Image</label>
                <div class="col-sm-9">
                <input type="file" name="footer_logo" class="form-control" required>
                <img class="mt-4" height="80px" width="80px" src="{{asset('storage/images/logo/'.$logoInfo['footer_logo'])}}" alt="" srcset="">
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-sm-3 col-form-label">Banner Video</label>
                <div class="col-sm-9">
                <input type="file" name="video" class="form-control" required>
                <video width="200px" height="100px" autoplay controls>
                    <source src="{{asset('storage/videos/'.$logoInfo['video'])}}" type="video/mp4">
                  </video>
                </div>
            </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
@stop

@section('javascript')

@endsection
