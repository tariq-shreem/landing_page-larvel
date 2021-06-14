@extends('admin.layout')
<style>.card{left:200%}</style>
@section('admin')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
   
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="card-body">
      <p class="login-box-msg">update your information.</p>
      <form action="{{url("updateProfile")}}" method="post">
        @csrf
       
          @error('name')
          <div class="text text-danger">{{$message}}</div>
          @enderror
        <div class="input-group mb-3">
          <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('email')
        <div class="text text-danger">{{$message}}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="text" name="email" value={{$user->email}} class="form-control" placeholder="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change data</button>
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