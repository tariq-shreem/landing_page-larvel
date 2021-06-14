@extends('admin.layout')

@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi .. {{Auth::user()->name}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container mr-5">
        <div class="row">
            <div class="col-md-8">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{url("brand/updateDone/$brand->id")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>brand name</label>
                      @error("brand_name")
                        {{$message}}
                      @enderror
                      <input type="text" value="{{$brand->brand_name}}" name="brand_name" class="form-control">
                    </div>

                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}"  />
                    <img src="{{asset($brand->brand_image)}}" />

                    <div class="form-group">
                        <label>brand image</label>
                        @error("brand_image")
                        {{$message}}
                      @enderror
                        <input type="file" name="brand_image" class="form-control">
                      </div>
                   
                    <button type="submit" class="btn btn-primary">update</button>
                  </form>
            
    </div>
</div>
</div>
</div>

@endsection