@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="row mt-4">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Admin Information(Change Information)</h4>
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
          <form class="forms-sample" action="{{url('admin/settings')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{Auth::guard('admin')->user()->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{Auth::guard('admin')->user()->email}}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{Auth::guard('admin')->user()->mobile}}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Admin Type</label>
                <input type="text" readonly class="form-control" id="type" name="type" value="{{Auth::guard('admin')->user()->type}}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Profile Image</label>
                <input type="file" class="form-control p-3" id="image" name="image">
                <img class="mt-4" style="border-radius: 50%" height="80px" width="80px" src="{{asset('storage/images/admin/profile/'.Auth::guard('admin')->user()->image)}}" alt="" srcset="">
              </div>
            <button type="submit" class="btn btn-primary mr-2">Update</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Change Password</h4>
          <form class="forms-sample" id="ChangeAdminPassword" action="{{url('admin/change-password')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="old" class="col-sm-3 col-form-label">Your Email</label>
                <div class="col-sm-9">
                  <input class="form-control" readonly value="{{Auth::guard('admin')->user()->email}}">
                </div>
              </div>
            <div class="form-group row">
              <label for="old" class="col-sm-3 col-form-label">Old Password</label>
              <div class="col-sm-9">
                <input type="password" name="Old" id="Old" class="form-control" placeholder="Old Password">
                <span id="checkPassword"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="new" class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="New" id="New" placeholder="New Password">
              </div>
            </div>
            <div class="form-group row">
                <label for="re" class="col-sm-3 col-form-label">Re Enter</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="Confirm" id="Confirm" placeholder="Confirm new password">
                  <div id="msg"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Change</button>
          </form>
        </div>
      </div>
    </div>
@stop
@section('javascript')
<script>
    $(document).ready(function(){
        $("#ChangeAdminPassword").keyup(function(){
             if ($("#New").val() != $("#Confirm").val()) {
                 $("#msg").html("Password do not match").css("color","red");
             }else{
                 $("#msg").html("Password matched").css("color","green");
            }
      });
});
</script>
@endsection
