@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-md-7 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add new work</h4>
        <form class="forms-sample" action="{{url('admin/work/add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="title" class="col-sm-3 col-form-label">Title</label>
              <div class="col-sm-9">
              <input type="text" name="title" class="form-control" required>
              </div>
            </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Heading1</label>
            <div class="col-sm-9">
              <input type="text" name="heading1" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label" >Heading2</label>
            <div class="col-sm-9">
              <input type="text" name="heading2" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Details1</label>
            <div class="col-sm-9">
                <textarea name="details1" class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Details2</label>
            <div class="col-sm-9">
                <textarea name="details2" class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Thumbnail</label>
            <div class="col-sm-9">
              <input type="file" name="thumbnail" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="link" class="col-sm-3 col-form-label">Video Link</label>
            <div class="col-sm-9">
              <input type="text" name="link" class="form-control" required>
            </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
@stop

@section('javascript')

@endsection
