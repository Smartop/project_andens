$(document).ready(function () {
    var target = $('.gallery');
    var winHeight = $(window).height();
    var targetPos = winHeight + 20;
    var scrollToElem = targetPos - winHeight;
    $(window).on('scroll', function () {
        var winScrollTop = $(this).scrollTop();
        if(winScrollTop > scrollToElem) {
              $(".scroll-icon").fadeOut("slow", function () {
                  // Animation complete.
              });
        }
    })
});
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
            success: console.log("Successful rated"),
        });
    });
})