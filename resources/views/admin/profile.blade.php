@extends('admin.includes.layout')

@section('main.admin')
    <div class="container">
        <div class="row">
            <div class="center-block text-center col-xs-8">
                <label>{{Auth::user()->name}}</label>
                <img class="img-responsive center-block" src="{{Auth::user()->image_url}}" width="300">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 text-center">
                <p>{{Auth::user()->first_name}}</p>
            </div>
            <div class="col-xs-4 text-center">
                <p>{{Auth::user()->last_name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 text-center">
                <p>{{Auth::user()->email}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <p>{{$numberOfPosts}}</p>
            </div>
        </div>
    </div>
@endsection
