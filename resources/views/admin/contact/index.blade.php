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
                            <td>contact address</td>
                            <td>contact email</td>
                            <td>contact phone</td>
                            <td>action </td>
                        </tr>
                    </thead>

                    <tbody>
                            <tr>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>

                                <td>
                                    <a href="{{url("about/edit/$contact->id")}}" class="btn btn-info">edit</a>
                                    <a href="{{url("about/delete/$contact->id")}}" class="btn btn-danger">delete</a>
                                </td>

                            </tr>
                        
                    </tbody>
                </table>

            </div>

            <div class="col-md-4">


            <form method="post" action="{{url("contact/add")}}">
                @csrf
                @error('address')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">contact address</label>
                  <input type="text" name="address" class="form-control">
                </div>

                @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">contact email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  @error('phone')
                  <div class="alert alert-danger">
                      {{$message}}
                      </div>
              @enderror
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">contact phone</label>
                    <input type="number" name="phone" class="form-control">
                  </div>
              
            
                

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    @endsection

