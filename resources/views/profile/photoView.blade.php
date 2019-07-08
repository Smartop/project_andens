@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/photo_page.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="cont">
        <div class="photo-block">
            <h2>{{ $photo->title }}</h2>
            <img src="{!!  $photo->file_name  !!}"
                 {{--  asset('storage/img/'.   --}}
                 alt="{{ $photo->title }}"
                 width="500px" height="auto">
            <h4>{{ $photo->desc }}</h4>
        </div>
        @auth
            <h2>Rating: </h2>
            <form action="{{ route('storeRating') }}" id="ratingForm"  method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                <div class="star-rating">
                    <fieldset>
                        <input type="radio" id="star5" name="rating" value="5"/>
                        <label for="star5" title="Outstanding">5 stars</label>
                        <input type="radio" id="star4" name="rating" value="4"/>
                        <label for="star4" title="Very Good">4 stars</label>
                        <input type="radio" id="star3" name="rating" value="3"/>
                        <label for="star3" title="Good">3 stars</label>
                        <input type="radio" id="star2" name="rating" value="2"/>
                        <label for="star2" title="Poor">2 stars</label>
                        <input type="radio" id="star1" name="rating" value="1"/>
                        <label for="star1" title="Very Poor">1 star</label>
                    </fieldset>
                </div>
                <input type="submit" value="OK">
            </form>
        @endauth
        @include('layouts.comment')
    </div>
@stop
