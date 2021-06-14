@extends('admin.layout')

@section('admin')
   
    <div class="py-12">
        <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <td>contact name</td>
                            <td>contact email</td>
                            <td>contact subject</td>
                            <td>contact message</td>
                            <td>action </td>
                        </tr>
                    </thead>
                    @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>

                                <td>
                                    @if($contact->status==1)
                                    <a href="{{url("contact/form-recopnce1/$contact->id")}}" class="btn btn-info">responce</a>
                                    @else 
                                    <button class="btn btn-success">done</button>
                                    @endif
                                    <a href="{{url("contact/form-delete/$contact->id")}}" class="btn btn-danger">delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            
    </div>

    @endsection

