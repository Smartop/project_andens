$(document).ready(function () {
    $('.gallery').on('click', ".favor", function () {
        console.log('clicked');
        $(this).find('form').submit();
    });

    $('form').on('submit', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/favorite",
            data: $("#favorForm").serialize(),
            success: console.log('done'),
        })
    });
})