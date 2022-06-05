<?php
/**
 * Dynamic Styles
 *
 * @package Words Lite
 */

function words_lite_dynamic_css(){
    
    $words_lite_primary_color = '#d13965';

    $category_list = the_words_category_list( $first = false );

    echo "<style type='text/css' media='all'>"; ?>

        a:hover, a:focus, a:active, .site-header.ta-header-1 .main-navigation a:hover, div#comments input#submit:hover, 
        div#comments input#submit, .tagcloud a:hover, .site-branding a, .ta-header-search input.search-submit:hover, 
        .entry-meta a:hover, .ta-medium-font:hover, .entry-title a:hover, span.posted-on:hover svg, 
        span.posted-on:hover a, span.byline.ta-author-image:hover a, span.cat-links.ta-cat-lists a, 
        .ta-footer-menu a:hover, .footer-widget-area a:hover, .ta-author-social a, .author-name-desc span, .entry-header-1 a:hover, 
        nav.navigation.pagination a, 
        .mc4wp-form-fields input[type="submit"]:hover, .mc4wp-form-fields input[type="submit"]:focus, h2.entry-title a, 
        nav.woocommerce-MyAccount-navigation .is-active a, .ta-social-share a svg, .ta-section-title h3, 
        .post-formate-icon svg, .title-banner-post a, .title-recent-post a, .title-recent-post a, .subescribe-title-wrap h2{
            color: <?php echo esc_attr( $words_lite_primary_color) ; ?>;
        }
        .title-banner-post a:hover, .title-recent-post a:hover{
            color: #afafaf;
        }
        button.menu-toggle span, div#comments input#submit, .tagcloud a, .ta-header-search input.search-submit,
         .site-header.ta-header-3 span.ta-search-hidden:after, 
        .ta-top-header.ta-top-header-2, .ta-top-header.ta-top-header-3, #secondary h2.widget-title:after, .widget input.search-submit, 
        span#ta-go-top, span#ta-go-top:hover, .ta-footer-social-icon a:hover, .ta-author-social a:hover, .entry-header-1 a, 
        nav.navigation.pagination span.page-numbers.current, nav.navigation.pagination a:hover, .featured-item-cat, 
        .mc4wp-form-fields input[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, 
        .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, 
        .woocommerce ul.products li.product .onsale, .ta-social-share a:hover, span.ta-bar-sticker, .ta-top-header, span#ta-go-top, .entry-header-1 .ta-cat-gucci{
            background: <?php echo esc_attr( $words_lite_primary_color) ; ?>;
        }

        .insta-gallery-feed .insta-gallery-actions .insta-gallery-button.follow, 
        .qligg-mfp-wrap .insta-gallery-actions .insta-gallery-button.follow{
            background: <?php echo esc_attr( $words_lite_primary_color) ; ?> !important;
        }

        div#comments input#submit, .tagcloud a, .ta-header-search input.search-submit,
         .site-header.ta-header-3 span.ta-search-hidden:before, 
        .widget input.search-submit, span#ta-go-top, .ta-author-social a, .entry-header-1 a, 
        nav.navigation.pagination a, nav.navigation.pagination span.page-numbers.current, 
        .mc4wp-form-fields input[type="submit"], .ta-ripple div, .ta-social-share a, .entry-header-1 .ta-cat-gucci{
            border-color: <?php echo esc_attr( $words_lite_primary_color) ; ?>;
        }

        <?php

        foreach( $category_list as $key => $category ){

            $cat_color = get_theme_mod('words_lite_cat_'.$key,'#d13965'); 

            if( $cat_color != '#d13965' ){ ?>

                .entry-header-1 .ta-cat-<?php echo esc_attr( $key ); ?>{
                    background: <?php echo esc_attr( $cat_color) ; ?>;
                }
                .entry-header-1 .ta-cat-<?php echo esc_attr( $key ); ?>{
                    border-color: <?php echo esc_attr( $cat_color) ; ?>;
                }

                span.cat-links.ta-cat-lists .color-ta-cat-<?php echo esc_attr( $key ); ?>, span.cat-links.ta-cat-lists .color-ta-cat-<?php echo esc_attr( $key ); ?>:hover{
                    color: <?php echo esc_attr( $cat_color) ; ?>;
                }

            <?php } ?>

        <?php } ?>

    <?php echo "</style>";
}

add_action('wp_head', 'words_lite_dynamic_css', 100);