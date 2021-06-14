<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi .. {{Auth::user()->name}}
        </h2>

        <div class="float-right">Total Users <span class="badge badge-danger">
            {{count($users)}}</span></div>



    </x-slot>
    <div class="py-12">
        <div class="container">
        <div class="row">

            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>name</td>
                        <td>email </td>
                        <td>created at </td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}} .. {{$user->created_at->diffForHumans()}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layout>
