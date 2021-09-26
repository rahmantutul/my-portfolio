@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-md-7 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit your social links</h4>
        <form class="forms-sample" action="{{url('admin/social/edit',$linkInfo['id'])}}" method="post">
            @csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Facebook</label>
            <div class="col-sm-9">
              <input type="text" name="facebook" class="form-control" id="" value="{{$linkInfo['facebook']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Instagram</label>
            <div class="col-sm-9">
              <input type="text" name="instagram" class="form-control" id="" value="{{$linkInfo['instagram']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tweeter</label>
            <div class="col-sm-9">
              <input type="text" name="tweeter" class="form-control" id="" value="{{$linkInfo['tweeter']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Vimeo</label>
            <div class="col-sm-9">
              <input type="text" name="vimeo" class="form-control" id=""  value="{{$linkInfo['vimeo']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">LinkedIn</label>
            <div class="col-sm-9">
              <input type="text" name="linkedIn" class="form-control" id="" value="{{$linkInfo['linkedin']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Google Map</label>
            <div class="col-sm-9">
              <input type="text" name="googleMap" class="form-control" id="" value="{{$linkInfo['googleMap']}}">
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
