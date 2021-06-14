@extends('admin.layout')
<style>.card{left:200%}</style>
@section('admin')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
   
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form action="{{url("updatePassword")}}" method="post">
        @csrf
        @error('old_password')
        <div class="text text-danger">{{$message}}</div>
        @enderror
        <div class="input-group mb-3">
      
            <input type="password" name="old_password" class="form-control" placeholder="old password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
          <div class="text text-danger">{{$message}}</div>
          @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password_confirmation')
        <div class="text text-danger">{{$message}}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection