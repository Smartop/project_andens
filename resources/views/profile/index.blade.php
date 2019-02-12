@extends('layouts.main')

@push('styles')
<link href="{{ asset('css/profile_page.css') }}" rel="stylesheet">
@endpush
@section('content')

{{-- <div class="q">
    <section id="header">
        <div class="">
            <div class="">
                <div class="">
                    <img class="userAvatar" src="{!! isset(Auth::user()->avatar) 
                                ? asset('storage/avatar/'. Auth::user()->avatar) 
                                : asset('img/no-avatar-image.png' )!!}"
                         alt="user avatar" width="100px" height="100px">
                </div>
                <div class="">
                    <h1>{{ $user->nickname }}</h1>
                </div>


            </div>
    </section>
    @auth
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add
        image</button>
    @include('layouts._modal')
    @endauth

</div>
<div class="">

    @foreach ( $photos as $photo)
    <div class="">
        <a href="/photo/{{ $photo->id }}">
            {{-- <img src="{!! asset('storage/img/'. $photo->file_name ) !!}" <img src="{{ $photo->file_name }}" alt="{{ $photo->title }}"
                 width="400px" height="200px">
        </a>
    </div>
    @endforeach
</div>
</div> --}}
@section('profile-header')
<section class="header">
    <h1 class="bio">{{ $user->bio }}</h1>
</section>
@endsection

<div class="cont">
    <section class="about">
        <div class="avatar">
            <img src="/{{ $user->getImage() }}" alt="">
            @auth
            @if (Auth::user()->nickname == $user->nickname)
            {{--  Show edit profile icon  --}}
            <a href="#" data-toggle="modal" data-target=".bd-profile-modal-lg">
                <i class="fas fa-user-edit"></i>
            
            </a>
            @include('profile.edit')
            @endif
            @endauth
        </div>
        @auth
        <a href="#"><img src="/img/add-image.png" alt="add-image" data-toggle="modal" data-target=".bd-example-modal-lg"></a>
        @include('layouts._modal')
        @endauth
    </section>
    <section class="gallery">
        <h2 class="title">My Photography</h2>
        <div class="photo-gallery">

            @foreach ( $photos as $photo)
            <div class="photo-block">
                <a href="/photo/{{ $photo->id }}">
                {{-- Uncomment when to production(and without seeder db image) --}}
                    {{-- <img src="{!! asset('storage/img/'. $photo->file_name ) !!}" --}} 
                    <img src="{{ $photo->file_name }}" alt="{{ $photo->title }}">
                </a>
                <p>{{ $photo->title }}</p>
            </div>
            @endforeach
        </div>
    </section>
</div>
<div>Icons made by <a href="https://www.flaticon.com/authors/roundicons" title="Roundicons">Roundicons</a> from <a href="https://www.flaticon.com/"
       title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0"
       target="_blank">CC 3.0 BY</a></div>
@endsection
