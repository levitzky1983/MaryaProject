$(function(){
    $nav = $('.fixed-div-my');
    $window = $(window);
    $h = $nav.offset().top;
    $window.scroll(function(){
        if(!$nav.hasClass('fixed-my')){
            if($window.scrollTop()>($h+300)){
                $nav.addClass('fixed-my').hide().slideDown();
            }
        } else {
            if(!($window.scrollTop()>($h+300))){
                $nav.removeClass('fixed-my');
            }
        }

    });
});

$(document).ready(function () {

    $('#topmenu .navbar-nav a').each( function (key,value) {
        if(document.URL == value.href){
            $(this).parent().addClass('active');
        }
    });
});



