

$(document).ready(function () {

    /*Load Parallax*/

    Materialize.fadeInImage('#parallax-img');
    $('.parallax').parallax();

    // scrollfire
    var options = [
        {selector: '.post-img', offset: 500, callback: 'Materialize.fadeInImage(".post-img")'}
    ]

    Materialize.scrollFire(options);

    // Smooth Scroll
    $('body a').smoothScroll({
        easing: 'swing',
        speed: 750
    });

    //Nice scroll for scrollbar
    $("html").niceScroll({

    });


    $(".button-collapse").sideNav();


    var $containerBlog = $("#blog-posts");
    $containerBlog.imagesLoaded(function () {
        $containerBlog.masonry({
            itemSelector: ".blog",
        });
    });

});