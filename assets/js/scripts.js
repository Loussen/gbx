//<![CDATA[
$(window).load(function () { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow': 'visible'});
})
//]]>

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('#back-to-top').tooltip('show');

});

$(document).ready(function () {
    $("html").niceScroll(({
        cursorcolor: "#BFBFBF",
        cursoropacitymin: 0,
        cursoropacitymax: 1,
        cursorwidth: "12px",
        cursorborder: "0",
        cursorborderradius: "0px",
        scrollspeed: 40,
        zindex: 4,
        mousescrollstep: 40,
        touchbehavior: false,
        hidecursordelay: 1000,
        hwacceleration: true,
    }));
});


$(document).ready(function () {

    var clickEvent = false;
    $('#myCarousel').carousel({
        interval: 4000,
        pause: "true"
    }).on('click', '.list-group li', function () {
        clickEvent = true;
        $('.list-group li').removeClass('active');
        $(this).addClass('active');
    }).on('slid.bs.carousel', function (e) {
        if (!clickEvent) {
            var count = $('.list-group').children().length - 1;
            var current = $('.list-group li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if (count == id) {
                $('.list-group li').first().addClass('active');
            }
        }
        clickEvent = false;
    });
})

$(window).load(function () {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight / itemlength + 1);
    $('#myCarousel .list-group-item').outerHeight(triggerheight);
});

$('.marquee').marquee({
    //speed in milliseconds of the marquee
    duration: 9000,
    //gap in pixels between the tickers
    gap: 50,
    //time in milliseconds before the marquee will start animating
    delayBeforeStart: 0,
    //'left' or 'right'
    direction: 'left',
    //true or false - should the marquee be duplicated to show an effect of continues flow
    duplicated: true,
    pauseOnHover: true
});

$(document).ready(function () {
    $('#Carousel').carousel({
        interval: 5000
    });

    $("img").addClass("img-responsive");
});

$(document).ready(function () {
    $("div.search_section input").on("keyup", function () {
        search_section($(this));
    });

    $("div.search_section button").on("click", function () {
        search_section($('div.search_section input'));
    });

    function search_section(current) {
        let value = $(current).val().toLowerCase();
        $("ul.units-list li a").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    }
})






