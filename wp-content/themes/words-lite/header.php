<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Words_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if( function_exists('wp_body_open') ){
		wp_body_open();
	}else{

		do_action( 'wp_body_open' );

	}
	
	$ed_preloader = get_theme_mod('ed_preloader',1);
	if( $ed_preloader ){ ?>

		<div class="ta-preloader">
			<div class="ta-ripple">
				<div></div><div></div>
			</div>
		</div>
		
	<?php } ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'words-lite' ); ?></a>

		<?php
		$ed_top_notiece_bar = get_theme_mod( 'ed_top_notiece_bar',1 );
		$ed_top_notiece_bar_sticker_label = get_theme_mod( 'ed_top_notiece_bar_sticker_label',esc_html__( 'Info', 'words-lite' ) );
		$ed_top_notiece_bar_title = get_theme_mod( 'ed_top_notiece_bar_title',esc_html__( 'The hedgehog was engaged in a fight with', 'words-lite' ) );
		$ed_top_notiece_bar_link_label = get_theme_mod( 'ed_top_notiece_bar_link_label',esc_html__( 'Read More', 'words-lite' ) );
		$ed_top_notiece_bar_link = get_theme_mod( 'ed_top_notiece_bar_link' );
		
		if( $ed_top_notiece_bar ){ ?>
			<div class="ta-top-notice-bar-main">

				<div class="ta-top-notice-bar">
					
					<?php if( $ed_top_notiece_bar_sticker_label ){ ?>
						<span class="ta-bar-sticker"><?php echo esc_html( $ed_top_notiece_bar_sticker_label ); ?></span>
					<?php } ?>

					<?php if( $ed_top_notiece_bar_title ){ ?>
						<h2><?php echo esc_html( $ed_top_notiece_bar_title ); ?></h2>
					<?php } ?>

					<?php if( $ed_top_notiece_bar_link_label ){ ?>
						<a href="<?php echo esc_url( $ed_top_notiece_bar_link ); ?>"><?php echo esc_html( $ed_top_notiece_bar_link_label ); ?></a>
					<?php } ?>

				</div>

				<div class="toggle-notice-bar">
					<button>
						<span class="toggle-notice-bar-close">
							<svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
	                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
	                        </svg>
                        </span>
					</button>
				</div>

			</div>
		
		<?php
		}

		$ta_header_layout = get_theme_mod('ta_header_layout',1);
		get_template_part( 'template-parts/header/header', $ta_header_layout );
		
		if( !is_home() && !is_front_page() ){ ?> 

			<div class="ta-breadcrumb-container">
				<div class="ta-container clearfix">

					<?php breadcrumb_trail(); ?>

					<header class="page-header">
						<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
					</header><!-- .page-header -->

				</div>
			</div>

		<?php }

		if( is_front_page() ){
			
			$ta_header_banner_layout = get_theme_mod('ta_header_banner_layout',1);
			get_template_part( 'template-parts/banner/banner', $ta_header_banner_layout );

			the_words_featured_category();

			/**
		     * the_words_subescribe - 10
		    **/
		    do_action('the_words_header_content','the_words_subescribe');
		}

		?>

		<div id="content" class="site-content">