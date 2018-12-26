@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $user->nickname }}</h1>

            @auth
            {{--  <button id="show-modal">Add image</button>  --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add image</button>
            @include('layouts._modal')
            @endauth

        </div>
        <div class="col-md-8 col-lg-10">

            @foreach ( $photos as $photo)
            <div class="col md-4">
                <img src="{!! asset('storage/img/'. $photo->file_name ) !!}" alt="{{ $photo->title }}" width="400px" height="200px">
            </div>
            @endforeach
            </div>
        </div>
    </div>
@stop
