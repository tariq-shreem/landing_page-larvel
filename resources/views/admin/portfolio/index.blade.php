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
                            <td>portfolio name</td>
                        
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($portfolios as $portfolio)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$portfolio->name}}</td>
                                <td>
                                    <a href="{{url("portfolio/edit/$portfolio->id")}}" class="btn btn-info">edit</a>
                                    <a href="{{url("portfolio/delete/$portfolio->id")}}" class="btn btn-danger">delete</a>
                                </td>
                        @endforeach
                            </tr>
                        
                    </tbody>
                </table>

            </div>

            <div class="col-md-4">


            <form method="post" action="{{url("portfolio/add")}}" >
                @csrf
                @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">portfolio name</label>
                  <input type="text" name="name" class="form-control">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    @endsection

