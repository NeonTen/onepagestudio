<?php
/**
 * The ACF block for displaying our services.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'our-services-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'our-services';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$image      = get_field( 'services_background_image' );
$small_text = get_field( 'services_small_text' );
$heading    = get_field( 'services_heading' );

if ( ! $image && ! $small_text && ! $heading && ! have_rows( 'services_lists' ) ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> w-full h-full py-12 md:py-24 bg-cover bg-no-repeat" style="background-image: url('<?php echo $image ? esc_url( $image ) : ''; ?>');">
	<div class="container">

		<div class="bg-[#f2f2f2] xl:ml-24 p-12 shadow-xl">

			<?php
			// Small text.
			if ( $small_text ) {
				echo '<p class="text-1.5xl font-semibold text-text-color uppercase">' . esc_html( $small_text ) . '</p>';
			}

			// Main heading.
			if ( $heading ) {
				echo '<h2 class="text-4xl md:text-5.2xl font-medium text-dark-blue-color mt-2">' . esc_html( $heading ) . '</h2>';
			}

			// Check Services lists exists.
			if ( have_rows( 'services_lists' ) ) :

				echo '<div class="grid md:grid-cols-2 gap-x-16 gap-y-8 mt-8">';

				// Loop through rows.
				while ( have_rows( 'services_lists' ) ) :
					the_row();

					// Load sub field value.
					$icon    = get_sub_field( 'service_icon' );
					$text    = get_sub_field( 'service_title' );
					$content = get_sub_field( 'service_content' );

					$icon_html = '';

					if ( $icon ) {
						$icon_html = sprintf(
							'<div class="icon shrink-0">
								<img class="w-12 h-12 object-scale-down" src="%s" alt="%s">
							</div>',
							$icon,
							__( 'Service icon', 'onepagestudio' )
						);
					}

					printf(
						'<div class="flex space-x-8">
							%s
							<div>
								<h3 class="text-1.5xl font-semibold text-dark-blue-color">%s</h3>
								<p class="text-text-color mt-2.5">%s</p>
							</div>
						</div>',
						wp_kses_post( $icon_html ),
						wp_kses_post( $text ),
						wp_kses_post( $content )
					);

				endwhile;

				echo '</div>';

			endif;
			?>

		</div>

	</div>
</section>
