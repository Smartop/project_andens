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