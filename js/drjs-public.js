(function( $ ) {
    $('#drBanner').on(
        'click',
        '.menu-open',
        function( event ) {

            event.preventDefault();

            var menu = $('#main-menu-toggle');

            if ( menu.hasClass( 'is-open' ) ) {

                dr_close_menu( menu );

            } else {

                dr_open_menu( menu );

            }
            
        }
    );

    $('#drBanner').on(
        'click',
        '.site-header-widgets-open',
        function( event ) {

            event.preventDefault();

            var search = $('#site-header-widgets');

            if ( search.hasClass( 'is-open' ) ) {

                dr_close_search( search );

            } else {

                dr_open_search( search );

            }
            
        }
    );

    $('#drBanner').on(
        'click',
        '.site-header-widgets-close',
        function( event ) {

            var search = $('#site-header-widgets');
            event.preventDefault();
            dr_close_search( search );
            
        }
    );

    $('#drBanner').on(
        'click',
        '.menu-close',
        function( event ) {

            var menu = $('#main-menu-toggle');
            event.preventDefault();
            dr_close_menu( menu );
            
        }
    );

    function dr_open_menu( menu ) {

        menu.slideDown(
            'fast',
            function(){
                menu.addClass( 'is-open' );
            }
        );

    }

    function dr_open_search( search ){

        search.slideDown(
            'fast',
            function(){
                search.addClass( 'is-open' );
            }
        );

    }

    function dr_close_search( search ){

        search.slideUp('fast',
            function(){
                search.removeClass( 'is-open' );
            }
        );

    }

    function dr_close_menu( menu ) {

        menu.slideUp('fast',
            function(){
                menu.removeClass( 'is-open' );
            }
        );
    }
})( jQuery );