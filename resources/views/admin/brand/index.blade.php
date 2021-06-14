@extends('admin.layout')

@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi .. {{Auth::user()->name}}
        </h2>

        <div class="float-right">Total brands <span class="badge badge-danger">
            {{count($brands)}}</span></div>



    </x-slot>
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
                            <td>brand name</td>
                            <td>brand image </td>
                            <td>created at </td>
                            <td>action </td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->brand_name}}</td>
                                <td><img src="{{asset($brand->brand_image)}}" width="100px"></td>

                                <td>
                                    @if($brand->created_at==null)
                                        <span class="text text-danger">no data</span>
                                    @else
                                    {{$brand->created_at}} .. {{$brand->created_at->diffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url("brand/update/$brand->id")}}" class="btn btn-info">edit</a>
                                    <a href="{{url("brand/delete/$brand->id")}}" class="btn btn-danger">delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$brands->links()}}
            </div>

            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Clients</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{url("brand/add")}}" enctype="multipart/form-data">
                        @csrf
                        @error('brand_name')
                        <div class="alert alert-danger">
                            {{$message}}
                            </div>
                    @enderror
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">brand name</label>
                          <input   type="text" name="brand_name" class="form-control" id="exampleInputEmail1" >
                        </div>

                        @error('brand_image')
                        <div class="alert alert-danger">
                            {{$message}}
                            </div>
                    @enderror
                        <div class="form-group">
                          <label for="exampleInputFile">brand image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="brand_image" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>
                      
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
        </div>
    </div>

    @endsection

