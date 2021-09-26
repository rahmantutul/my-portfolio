@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-md-7 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add new logo</h4>
        <form class="forms-sample" action="{{url('admin/logo/add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Header Logo</label>
                <div class="col-sm-9">
                <input type="file" name="header_logo" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Parallax Image</label>
                <div class="col-sm-9">
                <input type="file" name="parallax" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Footer Image</label>
                <div class="col-sm-9">
                <input type="file" name="footer_logo" class="form-control" required>
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-sm-3 col-form-label">Banner Video</label>
                <div class="col-sm-9">
                <input type="file" name="video" class="form-control" required>
            </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
@stop

@section('javascript')

@endsection
