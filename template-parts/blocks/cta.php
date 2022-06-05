<?php
/**
 * The ACF block for displaying cta.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'cta';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$image      = get_field( 'cta_background_image' );
$heading    = get_field( 'cta_heading' );
$content    = get_field( 'cta_content' );
$btn        = get_field( 'cta_button' );

if ( ! $image && ! $heading && ! $content && ! $btn ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> w-full bg-cover bg-no-repeat grid items-center text-white mt-8 py-20" style="background-image: url('<?php echo $image ? esc_url( $image ) : ''; ?>');">
	<div class="container">

		<div class="md:flex justify-between items-center text-center md:text-left">
		<?php
		if ( $heading || $content ) {
			echo '<div class="flex flex-col">';
			if ( $heading ) {
				echo '<h2 class="text-4xl lg:text-5.2xl font-medium">' . wp_kses_post( $heading ) . '</h2>';
			}
			if ( $content ) {
				echo '<p class="mt-3">' . wp_kses_post( $content ) . '</p>';
			}
			echo '</div>';
		}
		if ( $btn ) {
			printf(
				'<a href="%s" class="button mt-6 md:mt-0" target="%s">%s</a>',
				esc_url( $btn['url'] ),
				esc_html( $btn['target'] ),
				esc_html( $btn['title'] )
			);
		}
		?>
		</div>

	</div>
</section>
