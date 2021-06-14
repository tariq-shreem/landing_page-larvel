<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi .. {{Auth::user()->name}}
        </h2>

        <div class="float-right">Total cats <span class="badge badge-danger">
            {{count($cats)}}</span></div>



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
                            <td>name</td>
                            <td>user </td>
                            <td>created at </td>
                            <td>action </td>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach($cats as $cat) 
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$cat->category_name}}</td>
                                <td>{{$cat->user->name}}</td>
                                
                                <td>
                                    @if($cat->created_at==null)
                                        <span class="text text-danger">no data</span>
                                    @else
                                    {{$cat->created_at}} .. {{$cat->created_at->diffForHumans()}}
                                    @endif
                                </td>
                                <td> <a href="{{url("category/delete/$cat->id")}}" class="btn btn-danger">delete</a> </td>
    
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$cats->links()}}
            </div>

            <div class="col-md-4">

                @error('category_name')
                    <div class="alert alert-danger">
                        {{$message}}
                        </div>
                @enderror
            <form method="post" action="{{url("category/add")}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Add Category</label>
                  <input type="text" name="category_name" class="form-control">
                </div>
             
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>trashed category</h2>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>name</td>
                <td>user </td>
                <td>created at </td>
                <td>action </td>
            </tr>
        </thead>

        <tbody>
            @foreach($trashed as $cat) 
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cat->category_name}}</td>
                    <td>{{$cat->user->name}}</td>
                    
                    <td>
                        @if($cat->created_at==null)
                            <span class="text text-danger">no data</span>
                        @else
                        {{$cat->created_at}} .. {{$cat->created_at->diffForHumans()}}
                        @endif
                    </td>
                    <td> 
                        <a href="{{url("category/forceDelete/$cat->id")}}" class="btn btn-danger">delete</a>
                        <a href="{{url("category/restore/$cat->id")}}" class="btn btn-info">restore</a>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
        </div>
    </div>
</x-app-layout>
