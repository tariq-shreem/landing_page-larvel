@extends('admin.layout')

@section('admin')
 
    <div class="py-12">
        <div class="container mr-5">
        <div class="row">
            <div class="col-md-8">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{url("slider/update/$slider->id")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>slider title</label>
                      @error("slider_title")
                        {{$message}}
                      @enderror
                      <input type="text" value="{{$slider->slider_title}}" name="slider_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>slider description</label>
                        @error("slider_description")
                          {{$message}}
                        @enderror
                        <textarea  name="slider_description" class="form-control">{{$slider->slider_description}} </textarea>
                      </div>
                    <input type="hidden" name="old_image" value="{{$slider->slider_img}}"  />
                    <img width="200px" src="{{asset($slider->slider_img)}}" />

                    <div class="form-group">
                        <label>slider image</label>
                        @error("slider_img")
                        {{$message}}
                      @enderror
                        <input type="file" name="slider_img" class="form-control">
                      </div>
                   
                    <button type="submit" class="btn btn-primary">update</button>
                  </form>
            
    </div>
</div>
</div>
</div>

@endsection