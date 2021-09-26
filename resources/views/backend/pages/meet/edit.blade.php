@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-md-7 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit your meet section</h4>
        <form class="forms-sample" action="{{url('admin/meet/edit/'.$meetInfo['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Heading1</label>
            <div class="col-sm-9">
              <input type="text" name="heading1" class="form-control" id="" value="{{$meetInfo['heading1']}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Heading2</label>
            <div class="col-sm-9">
              <input type="text" name="heading2" class="form-control" id="" value="{{$meetInfo['heading2']}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Details1</label>
            <div class="col-sm-9">
                <textarea name="details1" class="form-control" required>{{$meetInfo['details1']}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Details2</label>
            <div class="col-sm-9">
                <textarea name="details2" class="form-control" required>{{$meetInfo['details2']}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Side Image</label>
            <div class="col-sm-9">
              <input type="file" name="image" class="form-control">
              <img class="mt-4" height="80px" width="80px" src="{{asset('storage/images/meet/'.$meetInfo['image'])}}" alt="" srcset="">
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
