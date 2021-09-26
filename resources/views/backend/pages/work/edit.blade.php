@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-md-7 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit your work</h4>
        <form class="forms-sample" action="{{url('admin/work/edit',$workInfo['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" id="" value="{{$workInfo['title']}}" required>
                </div>
            </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Heading1</label>
            <div class="col-sm-9">
              <input type="text" name="heading1" class="form-control" id="" value="{{$workInfo['heading1']}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Heading2</label>
            <div class="col-sm-9">
              <input type="text" name="heading2" class="form-control" id="" value="{{$workInfo['heading2']}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Details1</label>
            <div class="col-sm-9">
                <textarea name="details1" class="form-control" required>{{$workInfo['details1']}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Details2</label>
            <div class="col-sm-9">
                <textarea name="details2" class="form-control" required>{{$workInfo['details2']}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Thumbnail</label>
            <div class="col-sm-9">
              <input type="file" name="thumbnail" class="form-control">
              <img class="mt-4" height="80px" width="80px" src="{{asset('storage/images/work/'.$workInfo['thumbnail'])}}" alt="" srcset="">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Video Link</label>
            <div class="col-sm-9">
                <textarea name="link" class="form-control" required>{{$workInfo['link']}}</textarea>
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
