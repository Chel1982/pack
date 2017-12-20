var owl = $('.news-slider');
$('.news-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:1,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-news-button').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-news-button').click(function() {
    owl.trigger('prev.owl.carousel', [300]);
})
var owl1 = $('.catalog-slider');
$('.catalog-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-catalog-button').click(function() {
    owl1.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-catalog-button').click(function() {
    owl1.trigger('prev.owl.carousel', [300]);
})
var owl2 = $('.interview-slider');
$('.interview-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-interview-button').click(function() {
    owl2.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-interview-button').click(function() {
    owl2.trigger('prev.owl.carousel', [300]);
})


var owl3 = $('.technology-slider');
$('.technology-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-technology-button').click(function() {
    owl3.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-technology-button').click(function() {
    owl3.trigger('prev.owl.carousel', [300]);
})

var owl4 = $('.magazine-slider');
$('.magazine-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-magazine-button').click(function() {
    owl4.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-magazine-button').click(function() {
    owl4.trigger('prev.owl.carousel', [300]);
})


var owl5 = $('.partners-slider');
$('.partners-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-partners-button').click(function() {
    owl5.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-partners-button').click(function() {
    owl5.trigger('prev.owl.carousel', [300]);
})
var owl6 = $('.gallery-slider');
$('.gallery-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-gallery-button').click(function() {
    owl6.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-gallery-button').click(function() {
    owl6.trigger('prev.owl.carousel', [300]);
})
var owl7 = $('.same-slider');
$('.same-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            nav:false,
            loop:true
        },
    }
})

// Go to the next item
$('.next-company-button').click(function() {
    owl7.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-company-button').click(function() {
    owl7.trigger('prev.owl.carousel', [300]);
})

var owl8 = $('.banner-slider');
$('.banner-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false,
            loop:true
        },
    }
})

/*$(document).ready(function() {
    $('a.search-down-icon').click(function() {

        var activeInput = $('.search-field').find('input.active-search');

        activeInput.parent()
            .next()
            .find('input')
            .addClass('active-search');
        activeInput.removeClass('active-search');

    });

    $('a.search-up-icon').click(function() {
        var activeInput = $('.search-field').find('input.active-search');
        var prevInput = activeInput.prev('input').length ? activeInput.prev('input') : $('.search-field').find("input").last();
        activeInput.removeClass('active-search');
        prevInput.addClass('active-search');
    });
})*/


$(document).ready(function() {

    $(".search-input").keypress(function(e) {
        if(e.which === 13) {
            $(".search-form").submit();
        }
    });

    $('a.search-down-icon').click(function() {
        var activeInput = $('.search-field').find('input.active-search');
        var nextInput = $(activeInput).next('input').length ? $(activeInput).next('input') : $('.search-field').find("input").first();
        $(activeInput).removeClass('active-search');
        $(nextInput).addClass('active-search');
    });

    $('a.search-up-icon').click(function() {
        var activeInput = $('.search-field').find('input.active-search');
        var prevInput = $(activeInput).prev('input').length ? $(activeInput).prev('input') : $('.search-field').find("input").last();
        $(activeInput).removeClass('active-search');
        $(prevInput).addClass('active-search');
    });
});

