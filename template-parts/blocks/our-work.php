<?php
/**
 * The ACF block for displaying our work.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'our-work-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'our-work';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$small_text = get_field( 'work_small_text' );
$heading    = get_field( 'work_heading' );
$desc       = get_field( 'work_description' );

if ( ! $small_text && ! $heading && ! $desc && ! have_rows( 'members_lists' ) ) {
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

		// Description.
		if ( $desc ) {
			echo '<p class="text-text-color mt-7">' . esc_html( $desc ) . '</p>';
		}

		// Check Work members lists exists.
		if ( have_rows( 'members_lists' ) ) :

			echo '<div class="work-carousel mt-10 -mx-[15px] mb-8 lg:mb-0">';

			// Loop through rows.
			while ( have_rows( 'members_lists' ) ) :
				the_row();

				// Load sub field value.
				$image   = get_sub_field( 'member_image' );
				$name    = get_sub_field( 'member_name' );
				$job     = get_sub_field( 'member_job' );
				$content = get_sub_field( 'member_content' );

				$image_html = '';

				if ( $image || $name ) {
					$image_html = sprintf(
						'<img class="w-full aspect-square object-cover" src="%s" alt="%s">',
						$image,
						$name
					);
				}

				printf(
					'<div class="flex flex-col text-center px-[15px]">
						%s
						<h3 class="text-1.5xl font-semibold text-dark-blue-color mt-11">%s</h3>
						<p class="text-light-text-color mt-1">%s</p>
						<p class="text-text-color mt-4">%s</p>
					</div>',
					wp_kses_post( $image_html ),
					wp_kses_post( $name ),
					wp_kses_post( $job ),
					wp_kses_post( $content )
				);

			endwhile;

			echo '</div>';

		endif;
		?>

	</div>
</section>
