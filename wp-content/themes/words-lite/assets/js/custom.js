jQuery(document).ready(function($){
"use scrict";
    
    // Top Notice Bar
    $('.toggle-notice-bar button').click(function(){

        $('.ta-top-notice-bar').slideToggle();
        setTimeout(function(){

            $('.ta-top-notice-bar-main').remove();
            
        },300);

    });

});