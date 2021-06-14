@extends('admin.layout')

@section('admin')

    <div class="py-12">
        <div class="container">
        <div class="row">
            <div class="col-md-8">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <td>service heading</td>
                            <td>service icon</td>
                            <td>service description</td>
                            <td>action </td>
                        </tr>
                    </thead>

                    <tbody>
                        @if($services)
                        @foreach($services as $service)
                            <tr>
                                <td>{{$service->heading}}</td>
                                <td>{{$service->icon}}</td>
                                <td>{{$service->description}}</td>

                                <td>
                                    <a href="{{url("service/edit/$service->id")}}" class="btn btn-info">edit</a>
                                    <a href="{{url("service/delete/$service->id")}}" class="btn btn-danger">delete</a>
                                </td>

                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>

            <div class="col-md-4">


            <form method="post" action="{{url("service/add")}}">
                @csrf
                @error('heading')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">service heading</label>
                  <input type="text" name="heading" class="form-control">
                </div>

                @error('icon')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">service icon</label>
                    <textarea name="icon" class="form-control" class="form-control social-icon"></textarea>
                  </div>
                  @error('description')
                  <div class="alert alert-danger">
                      {{$message}}
                      </div>
              @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">service description</label>
                    <textarea name="description" class="form-control"></textarea>
                  </div>




                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    @endsection

