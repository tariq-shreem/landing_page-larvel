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
                            <td>#</td>
                            <td>slider title</td>
                            <td>slider image</td> 
                            <td>slider description</td> 
                            <td>action </td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>$loop->iteration</td>
                                <td>{{$slider->slider_title}}</td>
                                <td><img width="200px" src="{{asset($slider->slider_img)}}" /></td>
                                <td>{{$slider->slider_description}}</td>

                                <td>
                                    <a href="{{url("slider/edit/$slider->id")}}" class="btn btn-info">edit</a>
                                    <a href="{{url("slider/delete/$slider->id")}}" class="btn btn-danger">delete</a>
                                </td>
                        @endforeach
                            </tr>
                        
                    </tbody>
                </table>

            </div>

            <div class="col-md-4">


            <form method="post" action="{{url("slider/add")}}" 
            enctype="multipart/form-data">
                @csrf
                @error('slider_title')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">slider title</label>
                  <input type="text" name="slider_title" class="form-control">
                </div>

                @error('slider_img')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">slider image</label>
                    <input type="file" name="slider_img" class="form-control">
                  </div>

                @error('slider_description')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">slider description</label>
                    <textarea name="slider_description" class="form-control"></textarea>
                  </div>
              
            
                

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    @endsection

