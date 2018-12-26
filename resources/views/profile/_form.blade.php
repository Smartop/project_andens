<h2>Choose your photo</h2>
<form action="/addphoto" enctype="multipart/form-data" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" name="title" id="exampleFormControlInput1" required class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea name="desc" id="exampleFormControlTextarea1" cols="30" rows="4" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Category</label>
        <select name="category" id="exampleFormControlSelect1" class="form-control">
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
        <label for="exampleFormControlInput1">Your camera</label>
        <input type="text" name="camera" id="exampleFormControlInput1" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image:</label>
        <input type="file" required name="image" id="exampleFormControlFile1" class="form-control">
    </div>

        <button type="submit" class="btn btn-success" value="Upload">Завантажити</button>

</form>