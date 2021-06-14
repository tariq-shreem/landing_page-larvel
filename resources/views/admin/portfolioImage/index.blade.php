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
                            <td>image</td>
                            <td>portfolio</td> 
                            <td>action </td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($PortfolioImages as $img)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img width="200px" src="{{asset($img->img)}}" /></td>
                                <td>{{$img->Portfolio->name}}</td>

                                <td>
                                    <a href="{{url("portfolioImage/delete/$img->id")}}" class="btn btn-danger">delete</a>
                                </td>
                        @endforeach
                            </tr>
                        
                    </tbody>
                </table>

            </div>

            <div class="col-md-4">


            <form method="post" action="{{url("portfolioImage/add")}}" 
            enctype="multipart/form-data">
                @csrf
                @error('img')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">img </label>
                  <input type="file" name="img" class="form-control">
                </div>

                @error('portfolio')
                <div class="alert alert-danger">
                    {{$message}}
                    </div>
            @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">portfolio</label>
                    <select name="portfolio_id">
                        @foreach($portfolio as $p)
                        <option value={{$p->id}}>{{$p->name}}</option>
                        @endforeach
                    </select>
                  </div>

            
                

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    @endsection

