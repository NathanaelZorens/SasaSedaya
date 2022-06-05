<?php
/**
 * Words Lite Theme Customizer
 *
 * @package Words_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function words_lite_customize_register( $wp_customize ) {

	/**
	 *
	 * @package Words_Lite
	 */

	$wp_customize->add_section( 'top_bar_section',
	    array(
	    'title'      => esc_html__( 'Top Notice Bar Setting', 'words-lite' ),
	    'capability' => 'edit_theme_options',
	    'panel'      => 'theme_option_panel',
	    'priority'   => 1,
	    )
	);

	$wp_customize->add_setting('ed_top_notiece_bar',
	    array(
	        'default' => 1,
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'the_words_sanitize_checkbox',
	    )
	);
	$wp_customize->add_control('ed_top_notiece_bar',
	    array(
	        'label' => esc_html__('Enable Top Notice Bar', 'words-lite'),
	        'section' => 'top_bar_section',
	        'type' => 'checkbox',
	    )
	);

	$wp_customize->add_setting(
	    'ed_top_notiece_bar_sticker_label',
	    array(
	        'default' => esc_html__( 'Info', 'words-lite' ),
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    'ed_top_notiece_bar_sticker_label',
	    array(
	        'label' => esc_html__('Sticker Label','words-lite'),
	        'type' => 'text',
	        'section' => 'top_bar_section'
	    )
	);

	$wp_customize->add_setting(
	    'ed_top_notiece_bar_title',
	    array(
	        'default' => esc_html__( 'The hedgehog was engaged in a fight with', 'words-lite' ),
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    'ed_top_notiece_bar_title',
	    array(
	        'label' => esc_html__('Notice Bar Title','words-lite'),
	        'type' => 'text',
	        'section' => 'top_bar_section'
	    )
	);

	$wp_customize->add_setting(
	    'ed_top_notiece_bar_link_label',
	    array(
	        'default' => esc_html__( 'Read More', 'words-lite' ),
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    'ed_top_notiece_bar_link_label',
	    array(
	        'label' => esc_html__('Link Label','words-lite'),
	        'type' => 'text',
	        'section' => 'top_bar_section'
	    )
	);

	$wp_customize->add_setting(
	    'ed_top_notiece_bar_link',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    'ed_top_notiece_bar_link',
	    array(
	        'label' => esc_html__('Link','words-lite'),
	        'type' => 'text',
	        'section' => 'top_bar_section'
	    )
	);


	$category_list = words_lite_category_list( $first = false );

	$wp_customize->add_section( 'cat_color_section',
	    array(
	    'title'      => esc_html__( 'Category Color Settings', 'words-lite' ),
	    'capability' => 'edit_theme_options',
	    'panel'      => 'theme_option_panel',
	    )
	);

	$cat_count = 1;
	if( $category_list ){

	    foreach( $category_list as $key => $category ){

	        $wp_customize->add_setting(
	            'words_lite_cat_'.$key,
	            array(
	                'default' => '#d13965',
	                'sanitize_callback' => 'sanitize_hex_color'
	            )
	        );

	        $wp_customize->add_control( 
	            new WP_Customize_Color_Control( 
	            $wp_customize, 
	            'words_lite_cat_'.$key,
	            array(
	                'label'      => esc_html( $category ).esc_html__(' Color','words-lite'),
	                'section'    => 'cat_color_section',
	                'settings'   => 'words_lite_cat_'.$key,
	            ) ) 
	        );

	        $cat_count++;
	        if( $cat_count == 30 ){
	            break;
	        }
	    }

	}

}
add_action( 'customize_register', 'words_lite_customize_register' );