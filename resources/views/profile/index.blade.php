@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $user->nickname }}</h1>

                @auth
                    <a class="btn btn-success" href="/addphoto" role="button">Add photo</a>
                @endauth
                
            </div>
            <div class="col-md-8 col-lg-10">
                
                @foreach ( $photos as $photo)
                    <div class="col md-4">
                        <img src="img/{{ $photo->file_name }}" alt="{{ $photo->title }}">
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
@stop
