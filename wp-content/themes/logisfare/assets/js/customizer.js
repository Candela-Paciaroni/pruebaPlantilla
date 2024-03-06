( function( $ ) {
    
    if(typeof wp != 'undefined'){
        // global Color Settings
        wp.customize( '_logisfare_customizer_options[preset_primary_color]', function( value ) {
    
        value.bind( function( new_value ) {
            $( ':root' ).css({'color': new_value});
        });
    
        });
        wp.customize( '_logisfare_customizer_options[preset_secondary_color]', function( value ) {
    
        value.bind( function( new_value ) {
            $( ':root' ).css({'color': new_value});
        });
    
        });
        wp.customize( '_logisfare_customizer_options[preset_body_color]', function( value ) {
    
        value.bind( function( new_value ) {
            $( ':root' ).css({'color': new_value});
        });
    
        });
        wp.customize( '_logisfare_customizer_options[preset_white_color]', function( value ) {
    
        value.bind( function( new_value ) {
            $( ':root' ).css({'color': new_value});
        });
    
        });
        
        // font setting 
        wp.customize( '_logisfare_customizer_options[primary_fonts]', function( value ) {
    
        value.bind( function( new_value ) {
            $( 'body' ).css({'font-family': new_value});
        });
    
        });
        wp.customize( '_logisfare_customizer_options[secondary_fonts]', function( value ) {
    
        value.bind( function( new_value ) {
            $( 'body' ).css({'font-family': new_value});
        });
    
        });

        // Backg to Top btn 
        wp.customize( '_logisfare_customizer_options[footer_back_to_top_color]', function( value ) {
        value.bind( function( new_value ) {
            $( '#backtotop' ).css({'color': new_value});
        });
    
        }); 
        wp.customize( '_logisfare_customizer_options[footer_bck_to_top_bg]', function( value ) {
        value.bind( function( new_value ) {
            $( '#backtotop' ).css({'background-color': new_value});
        });
    
        });
        wp.customize( '_logisfare_customizer_options[footer_bck_to_top_bg_hr]', function( value ) {
        value.bind( function( new_value ) {
            $( '#backtotop:hover' ).css({'background-color': new_value});
        });
    
        });
    }
  })(jQuery);