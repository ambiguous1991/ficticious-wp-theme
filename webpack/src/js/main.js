const stickyOn = ({target}) => {
    const navbar = target.closest('.navbar');
    $(navbar).addClass('sticky');
};

const stickyOff = ({target}) => {
    const navbar = target.closest('.navbar');

    if(window.pageYOffset <= 1 ) {
        if (!$(navbar).find('.navbar-collapse').hasClass('show')) {
            $(navbar).removeClass('sticky');
        }
    }
};

const scrollStickyTop = () => {
    const navbar = $('.navbar');
    if (window.pageYOffset >= 1) {
        console.log("adding sticky");
        navbar.addClass('sticky');
    } else {
        if (!navbar.find('.navbar-collapse').hasClass('show')) {
            navbar.removeClass('sticky');
            navbar.find('.dropdown > ul').removeClass('show');
        }
    }
};

$(document).ready(() => {
    console.log('document ready');

    const topNavbar = $('.navbar');

    window.onscroll = () => scrollStickyTop();

    topNavbar.on({
        'show.bs.dropdown': (event) => stickyOn(event),
        'hide.bs.dropdown': (event) => stickyOff(event),
        'show.bs.collapse': (event) => stickyOn(event),
        'hide.bs.collapse': (event) => stickyOff(event)
    });
});