AOS.init({
    once: true
});

// add class "scrolled" to div when scrolled to .main-site-nav
$(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
        $('.main-site-nav').addClass('scrolled');
    } else {
        $('.main-site-nav').removeClass('scrolled');
    }
});
