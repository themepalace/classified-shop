( function( $ ) {
    $(window).load(function(){


    /*------------------------------------------------
                    SIDR MENU
    ------------------------------------------------*/

    $('#sidr-left-top-button').sidr({
        name: 'sidr-left-top',
        timing: 'ease-in-out',
        speed: 500,
        side: 'left',
        source: '.left'
    });
    $('#sidr-left-top-button .genericon').click(function(){
        $('body','html').css({'overflow-x': 'visible'});
    });

    /*------------------------------------------------
                    END SIDR MENU
    ------------------------------------------------*/


    /*------------------------------------------------
                    MENU ACTIVE
    ------------------------------------------------*/

    $('.main-navigation ul li').click(function(){
        $('.main-navigation ul li').removeClass('current-menu-item');
        $(this).addClass('current-menu-item');
    });

    /*------------------------------------------------
                    END MENU ACTIVE
    ------------------------------------------------*/

    /*------------------------------------------------
                    STICKY HEADER
    ------------------------------------------------*/

    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();  
        if (scroll > 1) {
            $(".site-header").addClass("is-sticky");
        }
        else {
            $(".site-header").removeClass("is-sticky");
        }
    });
    /*------------------------------------------------
                    END STICKY HEADER
    ------------------------------------------------*/

    /*------------------------------------------------
                    BACK TO TOP
    ------------------------------------------------*/

     $(window).scroll(function(){
        if ($(this).scrollTop() > 1) {
        $('.backtotop').css({bottom:"25px"});
        } else {
        $('.backtotop').css({bottom:"-100px"});
        }
        });
        $('.backtotop').click(function(){
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
        });
    /*------------------------------------------------
                    END BACK TO TOP
    ------------------------------------------------*/

    /*------------------------------------------------
                    TEXTAREA LENGTH COUNTER
    ------------------------------------------------*/

    var maxLength = 5000;
    $('textarea').keyup(function() {
      var length = $(this).val().length;
      var length = maxLength-length;
      $('.chars').text(length);
    });

    /*------------------------------------------------
                END OF TEXTAREA LENGTH COUNTER
    ------------------------------------------------*/

    /*------------------------------------------------
                    RADIO BUTTON
    ------------------------------------------------*/

    $('input[type=radio]').click(function(){

        if (this.previous) {
            this.checked = false;
        }
        this.previous = this.checked;
    });

    /*------------------------------------------------
                    END RADIO BUTTON
    ------------------------------------------------*/
    /*------------------------------------------------
                    DATEPICKER
    ------------------------------------------------*/
    $(function() {
        $( ".datepicker" ).datepicker();
    });
    /*------------------------------------------------
                    END DATEPICKER
    ------------------------------------------------*/

    /*------------------------------------------------
                    PRICE RANGE
    ------------------------------------------------*/

    $("#Slider1").slider({ from: 1000, to: 100000, step: 500, 
        smooth: true, round: 0, dimension: "&nbsp;$", skin: "plastic" });

    /*------------------------------------------------
                    END PRICE RANGE
    ------------------------------------------------*/


    /*------------------------------------------------
                    TABS
    ------------------------------------------------*/
    $('ul.tabs li').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('active');
        $('.tab-content').removeClass('active');

        $(this).addClass('active');
        $("#"+tab_id).addClass('active');
    });

    /*------------------------------------------------
                    END TABS
    ------------------------------------------------*/

    /*------------------------------------------------
                    Search 
    ------------------------------------------------*/

    $('.filter input.search').click(function() {
        if ($('.filter input.search').text().length == 1 )
            $('.filter .fa.fa-search').addClass('empty');
        else
            $('.filter .fa.fa-search').addClass('close');
    });


    /*------------------------------------------------
                    End Search 
    ------------------------------------------------*/


    /*------------------------------------------------
                    Pagination 
    ------------------------------------------------*/

    $('.pagination li').click(function(){
        $('.pagination li').removeClass('active');
        $(this).addClass('active');
    });

    /*------------------------------------------------
                End Pagination 
    ------------------------------------------------*/

    });

    /*------------------------------------------------
                END JQUERY
    ------------------------------------------------*/
} )( jQuery );