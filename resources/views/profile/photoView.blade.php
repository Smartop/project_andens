@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-8 align-content-center">
            <h2>{{ $photo->title }}</h2>
            <img src="{!! asset('storage/img/'. $photo->file_name ) !!}" 
                alt="{{ $photo->title }}" 
                width="500px"
                height="auto">
            <h4>{{ $photo->desc }}</h4>
        </div>
    </div>
</div>

@include('layouts.comment')

@stop
