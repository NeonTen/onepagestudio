<?php
/**
 * The ACF block for displaying Testimonials.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonials';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$small_text = get_field( 'testimonials_small_text' );
$heading    = get_field( 'testimonials_heading' );

if ( ! $small_text && ! $heading && ! have_rows( 'members_lists' ) ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> py-12 md:py-24">
	<div class="container">

		<?php
		// Small text.
		if ( $small_text ) {
			echo '<p class="text-1.5xl font-semibold text-text-color uppercase">' . esc_html( $small_text ) . '</p>';
		}

		// Main heading.
		if ( $heading ) {
			echo '<h2 class="text-4xl md:text-5.2xl font-medium text-dark-blue-color mt-2">' . esc_html( $heading ) . '</h2>';
		}

		// Check Testimonials exists.
		if ( have_rows( 'testimonials' ) ) :

			echo '<div class="testimonial-slider mt-12">';

			// Loop through rows.
			while ( have_rows( 'testimonials' ) ) :
				the_row();

				// Load sub field value.
				$image       = get_sub_field( 'author_image' );
				$testimonial = get_sub_field( 'testimonial' );
				$name        = get_sub_field( 'author_name' );
				$job         = get_sub_field( 'author_job' );

				$image_html = '';

				if ( $image || $name ) {
					$image_html = sprintf(
						'<img class="w-56 h-56 md:w-full md:h-full lg:w-[340px] lg:h-[340px] object-cover lg:shrink-0 mb-8 sm:mb-0 mx-auto" src="%s" alt="%s">',
						$image,
						$name
					);
				}

				printf(
					'<div><div class="sm:flex sm:space-x-12 text-center sm:text-left">
						%s
						<div class="flex flex-col">
							<p class="text-text-color">%s</p>
							<h3 class="text-1.5xl font-semibold text-dark-blue-color mt-9">%s</h3>
							<p class="text-light-text-color mt-1">%s</p>
						</div>
					</div></div>',
					wp_kses_post( $image_html ),
					wp_kses_post( $testimonial ),
					wp_kses_post( $name ),
					wp_kses_post( $job )
				);

			endwhile;

			echo '</div>';

		endif;
		?>

	</div>
</section>
