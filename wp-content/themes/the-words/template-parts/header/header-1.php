<?php
/**
 * Customizer Header Layout One
 *
 * @package The_Words
**/

$ed_header_search = get_theme_mod('ed_header_search',1);
$ed_header_social_icon = get_theme_mod('ed_header_social_icon',0);
$header_class  = '';
if( !$ed_header_search ){
	$header_class = 'ta-no-search';
}
?>

<?php if( has_nav_menu('the-words-top-menu') || $ed_header_social_icon ){ ?>

	<div class="ta-top-header top-header-1 <?php if( !has_nav_menu('the-words-top-menu') ){ echo 'no-menu'; }?>">

		<div class="ta-container clearfix">

			<?php if( has_nav_menu('the-words-top-menu') ){ ?>

				<div class="ta-top-menu">
					<nav id="top-site-navigation" class="top-navigation">

						<?php
						wp_nav_menu( array(
							'theme_location' => 'the-words-top-menu',
							'menu_id'        => 'top-menu',
							'depth'        => 1,
						) );
						?>

					</nav><!-- #site-navigation -->
				</div>

			<?php } ?>

			<?php
			if( $ed_header_social_icon ){
				do_action('the_words_social_icon_action');
			} ?>

		</div>

	</div>

<?php } ?>

<header id="masthead" class="site-header ta-header-1 <?php echo esc_attr( $header_class ); ?>" >

	<?php
	if( $ed_header_search ){ ?>

		<div class="ta-header-search">
			<div class="ta-container clearfix">

				<a href="javascript:void(0)" class="nav-focus-close"></a>

            	<?php get_search_form(); ?>

            	<div class="ta-header-search-close">
		            <a id="ta-search-close" href="javascript:void(0)"><span class="ta-search-close"></span></a>
		        </div>

		        <a href="javascript:void(0)" class="nav-focus-skip"></a>

	        </div>
        </div>

    <?php } ?>

    <div class="ta-header-main clearfix">

    	<div class="ta-container clearfix">

			<?php the_words_site_identity(); ?>

			<nav id="site-navigation" class="main-navigation">

				<button class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>

				<a href="javascript:void(0)" class="nav-focus-menu-last"></a>

				<button class="menu-toggle-close">
					<span></span>
					<span></span>
				</button>

				<?php
				wp_nav_menu( array(
					'theme_location' => 'the-words-primary-menu',
					'menu_id'        => 'primary-menu',
					'show_toggles' => true,
				) );
				?>

				<a href="javascript:void(0)" class="nav-focus-menu-close"></a>
				
			</nav><!-- #site-navigation -->

			<?php if( $ed_header_search ){ ?>

				<div class="ta-header-search-main <?php if( !$ed_header_social_icon ){ echo 'ta-no-social-icon'; } ?>">
					<a class="ta-search-toggle" href="javascript:void(0)">
						<span class="ta-search-hidden">
							<svg viewBox="0 0 512 512"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg>
						</span>
					</a>
				</div>

			<?php } ?>

		</div>

	</div>
	
</header><!-- #masthead -->