<?php
/**
 * The ACF block for displaying Counter.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'counter-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'counter';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$image = get_field( 'counter_background_image' );

if ( ! $image && ! have_rows( 'counter_lists' ) ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> w-full bg-cover bg-no-repeat grid items-center text-white py-20 mt-10 md:mt-0" style="background-image: url('<?php echo $image ? esc_url( $image ) : ''; ?>');">
	<div class="container">

		<?php
		// Check Counter lists exists.
		if ( have_rows( 'counter_lists' ) ) :

			echo '<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-x-[30px] gap-y-10">';

			// Loop through rows.
			while ( have_rows( 'counter_lists' ) ) :
				the_row();

				// Load sub field value.
				$icon   = get_sub_field( 'counter_icon' );
				$figure = get_sub_field( 'counter_figure' );
				$text   = get_sub_field( 'counter_text' );

				$icon_html = '';

				if ( $icon ) {
					$icon_html = '<img class="w-12 h-12 object-scale-down mx-auto" src="' . $icon . '">';
				}

				printf(
					'<div class="grid justify-center gap-4">
						%s
						<h3 class="text-4xl md:text-5.2xl font-semibold text-primary-color">%s</h3>
						<p class="">%s</p>
					</div>',
					wp_kses_post( $icon_html ),
					wp_kses_post( $figure ),
					wp_kses_post( $text )
				);

			endwhile;

			echo '</div>';

		endif;
		?>

	</div>
</section>
