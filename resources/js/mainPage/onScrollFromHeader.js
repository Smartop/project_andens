$(document).ready(function () {
    let target = $('.gallery');
    let winHeight = $(window).height();
    let targetPos = winHeight + 20;
    let scrollToElem = targetPos - winHeight;
    $(window).on('scroll', function () {
        let winScrollTop = $(this).scrollTop();
        if(winScrollTop > scrollToElem) {
              $(".scroll-icon").fadeOut("slow", function () {
                  // Animation complete.
              });
        }
    })
});