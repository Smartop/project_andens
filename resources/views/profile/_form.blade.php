<h2>Choose your photo</h2>
<form action="{{ route('storeImage') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" name="title" id="title" required class="form-control">
    </div>
    <div class="form-group">
        <label for="desc">Description</label>
        <textarea name="desc" id="desc" cols="30" rows="4" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
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
        <input type="text" name="camera" id="camera" class="form-control">
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" required name="image" id="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success" value="Upload">Завантажити</button>

</form>