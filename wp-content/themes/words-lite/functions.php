<?php
/**
 * Functions
 *
 * @package Words Lite
 */

if ( ! function_exists( 'words_lite_enqueue_scripts' ) ) :
	
	function words_lite_enqueue_scripts() {

		wp_enqueue_style( 'words-lite-parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_script( 'words-lite-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );
		
	}

endif;

add_action( 'wp_enqueue_scripts', 'words_lite_enqueue_scripts');

require get_stylesheet_directory() . '/inc/customizer.php';
require get_stylesheet_directory() . '/assets/css/style.php';

if( !function_exists('words_lite_category_list') ):

	/** Post Category List **/
	function words_lite_category_list( $first = true ){
	    
	    $cat_array = array();

	    if( $first ){
		    $cat_array[] = esc_html__('--Choose Category--','words-lite');

		    $cat_lists = get_categories(
		        array(
		            'hide_empty' => '0',
		            'exclude' => '1',
		        )
		    );

		}else{

			$cat_lists = get_categories(
		        array(
		            'hide_empty' => false,
		        )
		    );

		}

	    foreach( $cat_lists as $cat_list ){
	        $cat_array[$cat_list->slug] = $cat_list->name;
	    }
	    return $cat_array;
	}

endif;

if ( ! function_exists( 'the_words_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function the_words_entry_footer( $cats = true, $tags = false, $edcomments = false, $edit = false, $layout = 1 ) {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$ed_post_category = get_theme_mod('ed_post_category',1);
			if( $cats && $ed_post_category ){

				if( $layout == 2 ){

					/* translators: used between list items, there is a space after the comma */
					$categories = get_the_category();
	                if( $categories ){

	                    echo '<div class="entry-header-1">';

	                        foreach( $categories as $category ){

	                            $category_name = $category->name;
	                            $category_slug = $category->slug;
	                            $category_url = get_category_link( $category->term_id ); ?>

	                            <a class="ta-cat-<?php echo esc_attr( $category_slug ); ?>"  href="<?php echo esc_url( $category_url ); ?>" rel="category tag"><?php echo esc_html( $category_name ); ?></a>

	                        <?php
	                    	}

	                    echo '</div>';

	                }

				}else{

					/* translators: used between list items, there is a space after the comma */
					$categories = get_the_category();
	                if( $categories ){
	                	$count_cat = count($categories);
	                    echo '<span class="cat-links ta-cat-lists">';

	                    	$i = 1;
	                        foreach( $categories as $category ){

	                            $category_name = $category->name;
	                            $category_slug = $category->slug;
	                            $category_url = get_category_link( $category->term_id ); ?>
	                            
	                            <a class="color-ta-cat-<?php echo esc_attr( $category_slug ); ?>" href="<?php echo esc_url( $category_url ); ?>" rel="category tag"><?php echo esc_html( $category_name ); ?></a>
	                            <?php if( $count_cat != $i ){
	                            	echo ',';
	                            } ?>
	                            
	                        	<?php
	                        	$i++;

	                    	}

	                    echo '</span>';

	                }

				}

			}

			if( $tags ){
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'words-lite' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'words-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			}
		}

		if( $edcomments ){
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'words-lite' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						esc_html( get_the_title() )
					)
				);
				echo '</span>';
			}

		}

		if( $edit ){
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'words-lite' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					esc_html( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
		}

	}
endif;