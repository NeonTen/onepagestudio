<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package OnepageStudio
 */

/**
 * Prints HTML of logo.
 */
function theme_logo() {
	?>
	<div class="logo w-72">
	<?php
	if ( has_custom_logo() ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		$image_url      = $image[0];

		printf(
			'<a href="%s" class="navbar-brand">
				<img src="%s">
			</a>',
			esc_url( get_home_url() ),
			esc_url( $image_url )
		);
	} else {
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php
	}
	?>
	</div>
	<?php
}

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Prints HTML of header.
 */
function theme_header_html() {
	?>

	<!-- Header start -->
	<header class="site-header w-full absolute top-0 z-[1]">
		<div class="container">

			<div class="flex items-center justify-between min-h-[90px] text-white text-sm uppercase">
				<?php
				// Logo.
				theme_logo();

				// Navigation.
				get_template_part( 'template-parts/header/nav' );
				?>
			</div>

		</div>
	</header>
	<!-- Header end -->

	<?php
}

/**
 * Prints HTML of footer.
 */
function theme_footer_html() {

	$image = get_field( 'footer_background_image', 'option' );
	$logo  = get_field( 'footer_logo', 'option' );
	$bg    = '';

	if ( $image ) {
		$bg = 'style="background-image: url(' . $image . ');"';
	}
	?>

	<footer class="site-footer bg-cover text-[#c6c6c6] text-center py-12 md:py-24" <?php echo $bg; //phpcs:ignore ?>>
		<div class="container">

			<div class="grid justify-center gap-8">

			<?php
			// Footer logo.
			if ( $logo ) {
				echo '<img class="mx-auto" src="' . esc_url( $logo ) . '">';
			}
			?>

			<!-- Navigation -->
			<nav class="w-full">
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'footer-menu',
						'menu_id'        => 'footer-menu',
						'container'      => 'ul',
						'menu_class'     => 'flex justify-center flex-wrap gap-x-6 lg:gap-x-9 gap-y-4',
					]
				);
				?>
			</nav>

			<!-- Copyrights -->
			<?php the_field( 'copyrights', 'option' ); ?>
			</div>

		</div><!-- container end -->
	</footer>

	<?php
}
