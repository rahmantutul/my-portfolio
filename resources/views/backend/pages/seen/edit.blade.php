@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-md-7 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit your meet section</h4>
        <form class="forms-sample" action="{{url('admin/seen/edit/'.$seenInfo['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Details</label>
            <div class="col-sm-9">
                <textarea name="details" class="form-control" required>{{$seenInfo['details']}}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Side Image</label>
            <div class="col-sm-9">
              <input type="file" name="image" class="form-control">
              <img class="mt-4" height="80px" width="80px" src="{{asset('storage/images/seen/'.$seenInfo['image'])}}" alt="" srcset="">
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
