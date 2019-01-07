$(document).ready(function () {
    $('input[type=radio]').on('change', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/storeRating',
            type: "POST",
            data: $("#ratingForm").serialize(),
            success: alert("Successful rated"),
        });
    });
})