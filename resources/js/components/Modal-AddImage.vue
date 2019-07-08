<!--suppress HtmlUnknownTarget -->
<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">

                <div class="modal-header">
                    <h2>Choose your photo</h2>
                </div>

                <div class="modal-body">
                    <form action="/addphoto" enctype="multipart/form-data" method="post">
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
                            <input type="file" required id="image" name="image">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Upload">
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button class="modal-default-button btn btn-success"
                            @click="$emit('close')">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
