<?php
/**
 * The Words Theme Customizer
 *
 * @package The_Words
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_words_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_section( 'title_tagline' )->panel = 'the_words_general_panel';
	$wp_customize->get_section( 'header_image' )->panel = 'the_words_general_panel';
	$wp_customize->get_section( 'background_image' )->panel = 'the_words_general_panel';
	$wp_customize->get_section( 'colors' )->panel = 'the_words_general_panel';

	$wp_customize->add_setting('enable_site_title',
	    array(
	        'default' => 1,
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'the_words_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('enable_site_title',
	    array(
	        'label' => esc_html__('Display Site Title and Tagline', 'the-words'),
	        'section' => 'title_tagline',
	        'type' => 'checkbox',
	    )
	);

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'the_words_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'the_words_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_panel( 'the_words_general_panel',
		array(
			'title'      => esc_html__( 'General Settings', 'the-words' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel(
        'the_words_home_panel', 
    	array(
    		'priority'       => 5,
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
        	'title'          => esc_html__( 'Front Page Settings', 'the-words' ),
        ) 
    );

	$wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'the-words' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);
	
	require get_template_directory() . '/inc/customizer/preloader.php';
	require get_template_directory() . '/inc/customizer/social-icon.php';
	require get_template_directory() . '/inc/customizer/header.php';
	require get_template_directory() . '/inc/customizer/single.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layoyt.php';
	require get_template_directory() . '/inc/customizer/front-page.php';
	require get_template_directory() . '/inc/customizer/subescribe.php';
	require get_template_directory() . '/inc/customizer/instagram.php';
	
	/**  The Words Pro Link **/
    class The_Words_Link_Section extends WP_Customize_Section {

        public $type = 'the-words-pro';

        public $pro_text = '';

        public $pro_url = '';

        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            return $json;
        }
        protected function render_template() { ?>

            <li id="custom-section-{{ data.id }}" class="custom-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="custom-section-title" style="background: #5ca595; margin: 0; padding: 20px 5px 8px 5px; color: #fff;">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a style="margin-left: 10px; transform: translateY(-5px);" href="{{ data.pro_url }}" class="button button-custom center" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }

	/** Upgrade to The Words Pro **/

	$wp_customize->register_section_type( 'The_Words_Link_Section' );

	// Register sections.
	$wp_customize->add_section(
	    new The_Words_Link_Section(
	        $wp_customize,
	        'the-words-pro',
	        array(
	            'title'    => esc_html__( 'Upgrade to The Words Pro', 'the-words' ),
	            'pro_text' => esc_html__( 'Go Pro','the-words' ),
	            'pro_url'  => 'https://themesarray.com/wordpress_themes/the-words-pro',
	            'priority' => 1,
	        )
	    )
	);

}
add_action( 'customize_register', 'the_words_customize_register' );

require get_template_directory() . '/inc/customizer/sanitize.php';


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function the_words_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function the_words_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_words_customize_preview_js() {
	wp_enqueue_script( 'the-words-customizer', get_template_directory_uri() . '/assets/core/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'the_words_customize_preview_js' );

/**
 * Customizer Enqueue Upsale.
 */

if (!function_exists('the_words_customizer_upsale')) :

    function the_words_customizer_upsale(){   
        
        wp_enqueue_script('the-words-upsale', get_template_directory_uri() . '/assets/js/upsale.js', array('jquery'), '', 1);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'the_words_customizer_upsale');