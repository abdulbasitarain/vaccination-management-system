// Body 3

$(document).ready(function () {

    $('.counter').each(function () {
        $(this).prop('counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 10000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

});

// Body 3