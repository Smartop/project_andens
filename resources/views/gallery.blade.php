@extends('layouts.app')

@section('content')
    <h2>Latest photoes</h2>
    <div class="col-4">
{{--  asset('storage/img/'.  --}}
    @foreach ($photos as $photo)
    <a href="/photo/{{ $photo->id }}">
        <img src="{!! $photo->file_name  !!}" alt="{{ $photo->title }}" 
                width="400px"
                height="200px">
    </a>
    <p>{{ $photo->star_count }}</p>
    @endforeach
    </div>
@stop
