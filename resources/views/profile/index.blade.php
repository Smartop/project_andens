@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="d-flex align-content-start">
                <div class="p-2">
                    <img class="userAvatar" src="{!! isset(Auth::user()->avatar) 
                                ? asset('storage/avatar/'. Auth::user()->avatar) 
                                : asset('img/no-avatar-image.png' )!!}"
                                alt="user avatar" width="100px" height="100px">
                </div>
                <div class="p-2">
                    <h1>{{ $user->nickname }}</h1>
                </div>
                

            </div>

            @auth
            {{-- <button id="show-modal">Add image</button> --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add
                image</button>
            @include('layouts._modal')
            @endauth

        </div>
        <div class="col-md-8 col-lg-10">

            @foreach ( $photos as $photo)
            <div class="col md-4">
                <img src="{!! asset('storage/img/'. $photo->file_name ) !!}" alt="{{ $photo->title }}" width="400px"
                     height="200px">
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
