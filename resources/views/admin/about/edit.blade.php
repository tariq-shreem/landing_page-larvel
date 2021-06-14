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
                <form action="{{url("about/updateDone/$about->id")}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>about heading</label>
                      @error("about_heading")
                        {{$message}}
                      @enderror
                      <input type="text" value="{{$about->about_heading}}" name="about_heading" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>about short description</label>
                        @error("about_short_desc")
                          {{$message}}
                        @enderror
                        <textarea  name="about_short_desc" class="form-control">{{$about->about_short_desc}}</textarea>
                      </div>

                      <div class="form-group">
                        <label>about long description</label>
                        @error("about_short_desc")
                          {{$message}}
                        @enderror
                        <textarea  name="about_long_desc" class="form-control">{{$about->about_short_desc}}</textarea>
                      </div>


                    
                   
                    <button type="submit" class="btn btn-primary">update</button>
                  </form>
            
    </div>
</div>
</div>
</div>

@endsection