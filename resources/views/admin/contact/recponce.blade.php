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
                <form action="{{url("contact/form-recopnce2/$message->id")}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>message subject</label>
                      @error("subject")
                        {{$message}}
                      @enderror
                      <input type="text" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>message body</label>
                        @error("body")
                          {{$message}}
                        @enderror
                        <textarea  name="body" class="form-control"></textarea>
                      </div>

                    <button type="submit" class="btn btn-primary">send email</button>
                  </form>
            
    </div>
</div>
</div>
</div>

@endsection