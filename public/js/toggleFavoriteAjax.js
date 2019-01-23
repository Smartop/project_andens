$(document).ready(function () {
    $('.favor').click(function () {
        $(this).find("form").submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                data: $("#favorForm").serialize(),
                success: console.log("Successful"),
            })
        });

    });
})