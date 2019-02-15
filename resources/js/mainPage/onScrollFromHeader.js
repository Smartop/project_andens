$(document).ready(function () {
    var target = $('.gallery');
    var targetPos = target.offset().top + 100;
    var winHeight = $(window).height();
    var scrollToElem = targetPos - winHeight;
    $(window).on('scroll', function () {
        var winScrollTop = $(this).scrollTop();
        if(winScrollTop > scrollToElem) {
              $(".scroll-icon").fadeOut("slow", function () {
                  // Animation complete.
              });
            //$('.scroll-icon').hide();
        }
    })
});