@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $user->nickname }}</h1>

            @auth
            <button id="show-modal" @click="showModal = true">Add image</button>
            <modal-addimage v-if="showModal" @close="showModal = false">
                <h3 slot="header">custom header</h3>
            </modal-addimage>
            <div>
<form action="/addphoto" enctype="multipart/form-data" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div class="form-group">
        <label for="title">Description</label>
        <textarea name="desc" id="desc" cols="30" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="nature" selected="selected">Nature</option>
            <option value="sky">Sky</option>
            <option value="space">Space</option>
            <option value="minimalism">Minimalism</option>
            <option value="portrait">Portrait</option>
            <option value="city">City</option>
            <option value="night">Night</option>
        </select>
    </div>
    <div class="form-group">
        <label for="camera">Your camera</label>
        <input type="text" name="camera" id="camera">
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" required name="image">
    </div>

    <div class="form-group">
        <input type="submit" value="Upload">
    </div>

</form>
            </div>
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
