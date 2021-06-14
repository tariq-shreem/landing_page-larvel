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
                            <td>about heading</td>
                            <td>about short description</td>
                            <td>about long description</td>
                            <td>action </td>
                        </tr>
                    </thead>

                    <tbody>
                        @if($about)
                            <tr>
                                <td>{{$about->about_heading}}</td>
                                <td>{{$about->about_short_desc}}</td>
                                <td>{{$about->about_long_desc}}</td>

                                <td>
                                    <a href="{{url("about/edit/$about->id")}}" class="btn btn-info">edit</a>
                                    <a href="{{url("about/delete/$about->id")}}" class="btn btn-danger">delete</a>
                                </td>

                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>

            <div class="col-md-4">


            <form method="post" action="{{url("about/add")}}">
                @csrf
                @error('about_headeing')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">about heading</label>
                  <input type="text" name="about_heading" class="form-control">
                </div>

                @error('about_short_desc')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">about short description</label>
                    <textarea name="about_short_desc" class="form-control"></textarea>
                  </div>
                  @error('about_long_desc')
                  <div class="alert alert-danger">
                      {{$message}}
                      </div>
              @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">about long description</label>
                    <textarea name="about_long_desc" class="form-control"></textarea>
                  </div>




                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    @endsection

