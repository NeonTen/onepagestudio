<?php
/**
 * The ACF block for displaying our vision.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'our-vision-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'our-vision';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$image      = get_field( 'vision_background_image' );
$small_text = get_field( 'vision_small_text' );
$heading    = get_field( 'vision_heading' );
$desc       = get_field( 'vision_description' );

if ( ! $image && ! $small_text && ! $heading && ! $desc && ! have_rows( 'vision_lists' ) ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> py-12 md:py-24 relative">

	<?php
	if ( $image ) {
		?>
		<div class="w-full h-[536px] absolute top-0 left-0 right-0 -z-[1] overflow-hidden">
			<img src="<?php echo esc_url( $image ); ?>" class="w-full h-full object-cover">
		</div>
		<?php
	}
	?>
	<div class="container text-white">

		<?php
		// Small text.
		if ( $small_text ) {
			echo '<p class="text-1.5xl font-semibold uppercase">' . esc_html( $small_text ) . '</p>';
		}

		// Main heading.
		if ( $heading ) {
			echo '<h2 class="text-4xl md:text-5.2xl font-medium mt-2">' . esc_html( $heading ) . '</h2>';
		}

		// Description.
		if ( $desc ) {
			echo '<p class="mt-7">' . esc_html( $desc ) . '</p>';
		}

		// Check vision lists exists.
		if ( have_rows( 'vision_lists' ) ) :

			echo '<div class="vision-box grid sm:grid-cols-2 mt-12 border border-border-color">';

			// Loop through rows.
			while ( have_rows( 'vision_lists' ) ) :
				the_row();

				// Load sub field value.
				$icon         = get_sub_field( 'vision_icon' );
				$hover_icon   = get_sub_field( 'vision_hover_icon' );
				$vision_title = get_sub_field( 'vision_title' );
				$content      = get_sub_field( 'vision_content' );

				$icon_html       = '';
				$icon_hover_html = '';

				if ( $icon || $vision_title ) {
					$icon_html = sprintf(
						'<div class="icon">
							<img class="w-full h-12 object-scale-down" src="%s" alt="%s">
						</div>',
						$icon,
						$vision_title
					);
				}

				if ( $hover_icon ) {
					$icon_hover_html = sprintf(
						'<div class="absolute top-0 -right-full group-hover:right-0 transition-all">
							<img class="w-full h-full" src="%s">
						</div>',
						$hover_icon
					);
				}

				printf(
					'<div class="flex flex-col text-center bg-[#fbfbfb] hover:bg-[#f5f5f5] p-12 last:border-t sm:last:border-t-0 sm:last:border-l last:border-[#e0e0e0] relative group transition-all overflow-hidden">
						%s
						%s
						<h3 class="text-1.5xl font-semibold text-dark-blue-color mt-5">%s</h3>
						<p class="text-text-color mt-4">%s</p>
					</div>',
					wp_kses_post( $icon_html ),
					wp_kses_post( $icon_hover_html ),
					wp_kses_post( $vision_title ),
					wp_kses_post( $content )
				);

			endwhile;

			echo '</div>';

		endif;
		?>

	</div>
</section>
