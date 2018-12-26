<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @include('profile._form')
            <div class="row justify-content-end">

                <button class="btn btn-danger" @click="$emit('close')">
                    X
                </button>
            </div>

        </div>
    </div>

</div>