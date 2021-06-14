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
                <form action="{{url("service/updateDone/$service->id")}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>service heading</label>
                      @error("heading")
                        {{$message}}
                      @enderror
                      <input type="text" value="{{$service->heading}}" name="heading" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>service icon</label>
                        @error("icon")
                          {{$message}}
                        @enderror
                        <input  value="{{$service->icon}}" name="icon" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>service description</label>
                        @error("description")
                          {{$message}}
                        @enderror
                        <textarea  name="description" class="form-control">{{$service->description}}</textarea>
                      </div>


                    
                   
                    <button type="submit" class="btn btn-primary">update</button>
                  </form>
            
    </div>
</div>
</div>
</div>

@endsection