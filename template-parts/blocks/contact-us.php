<?php
/**
 * The ACF block for displaying Contact us.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-us-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'contact-us';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$small_text = get_field( 'contact_small_text' );
$heading    = get_field( 'contact_heading' );
$shortcode  = get_field( 'shortcode' );
$address    = get_field( 'address' );
$facebook   = get_field( 'facebook' );
$twitter    = get_field( 'twitter' );
$gplus      = get_field( 'gplus' );
$linkedin   = get_field( 'linkedin' );
$youtube    = get_field( 'youtube' );

$social_icons = '';

if ( $facebook ) {
	$social_icons = '<a class="w-[30px] h-[30px] hover:opacity-70" href="' . $facebook . '" target="_blank">' . get_svg( 'icons/facebook', false ) . '</a>';
}
if ( $twitter ) {
	$social_icons .= '<a class="w-[30px] h-[30px] hover:opacity-70" href="' . $twitter . '" target="_blank">' . get_svg( 'icons/twitter', false ) . '</a>';
}
if ( $gplus ) {
	$social_icons .= '<a class="w-10 h-10 hover:opacity-70" href="' . $gplus . '" target="_blank">' . get_svg( 'icons/gplus', false ) . '</a>';
}
if ( $linkedin ) {
	$social_icons .= '<a class="w-[30px] h-[30px] hover:opacity-70" href="' . $linkedin . '" target="_blank">' . get_svg( 'icons/linkedin', false ) . '</a>';
}
if ( $youtube ) {
	$social_icons .= '<a class="w-[30px] h-[30px] hover:opacity-70" href="' . $youtube . '" target="_blank">' . get_svg( 'icons/youtube', false ) . '</a>';
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> bg-[#fafafa] py-12 md:py-24">
	<div class="container">

		<?php
		// Small text.
		if ( $small_text ) {
			echo '<p class="text-1.5xl font-semibold text-text-color uppercase">' . esc_html( $small_text ) . '</p>';
		}

		// Main heading.
		if ( $heading ) {
			echo '<h2 class="text-4xl md:text-5.2xl font-medium text-black mt-2">' . esc_html( $heading ) . '</h2>';
		}
		?>

		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-[30px] mt-12">

			<!-- Contact Form -->
			<div class="w-full lg:col-span-2">
			<?php
			if ( $shortcode ) {
				echo do_shortcode( $shortcode );
			}
			?>
			</div>

			<!-- Address and social icons -->
			<div class="w-full">
				<?php
				// Address.
				if ( $address ) {
					echo '<div class="wysiwyg-editor">' . wp_kses_post( $address ) . '</div>';
				}

				// Social icons.
				if ( $facebook || $twitter || $gplus || $linkedin || $youtube ) {
					printf(
						'<div class="flex items-center space-x-8 mt-10">
							%s
						</div>',
						$social_icons // phpcs:ignore
					);
				}
				?>
			</div>

		</div>

	</div>
</section>
