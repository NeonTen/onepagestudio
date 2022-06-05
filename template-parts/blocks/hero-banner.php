<?php
/**
 * The ACF block for displaying hero banner.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-banner-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero-banner';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$image      = get_field( 'hero_background_image' );
$small_text = get_field( 'hero_small_text' );
$heading    = get_field( 'hero_heading' );
$content    = get_field( 'hero_content' );
$btn        = get_field( 'hero_button' );

if ( ! $image && ! $small_text && ! $heading && ! $content && ! $btn ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> w-full h-[820px] pt-[90px] bg-cover bg-no-repeat grid place-content-center text-white" style="background-image: url('<?php echo $image ? esc_url( $image ) : ''; ?>');">
	<div class="container">

		<div>
		<?php
		if ( $small_text ) {
			echo '<div class="text-primary-color uppercase font-semibold tracking-[5.76px]">' . wp_kses_post( $small_text ) . '</div>';
		}
		if ( $heading ) {
			echo '<h2 class="text-4xl sm:text-5xl lg:text-6xl font-semibold leading-snug sm:leading-snug lg:leading-snug mt-2">' . wp_kses_post( $heading ) . '</h2>';
		}
		if ( $content ) {
			echo '<p class="mt-4">' . wp_kses_post( $content ) . '</p>';
		}
		if ( $btn ) {
			printf(
				'<a href="%s" class="button mt-10" target="%s">%s</a>',
				esc_url( $btn['url'] ),
				esc_html( $btn['target'] ),
				esc_html( $btn['title'] )
			);
		}
		?>
		</div>

	</div>
</section>
