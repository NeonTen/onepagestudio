<?php
/**
 * The ACF block for displaying our team.
 *
 * @package OnepageStudio
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'our-team-' . $block['id']; //phpcs:ignore
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor']; //phpcs:ignore
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'our-team';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' text-' . $block['align'];
}

$small_text = get_field( 'team_small_text' );
$heading    = get_field( 'team_heading' );
$desc       = get_field( 'team_description' );

if ( ! $small_text && ! $heading && ! $desc && ! have_rows( 'team_members' ) ) {
	return;
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> pb-12 md:pb-24">
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

		// Check Team members lists exists.
		if ( have_rows( 'team_members' ) ) :

			echo '<div class="team-carousel mt-10 -mx-[15px]">';

			// Loop through rows.
			while ( have_rows( 'team_members' ) ) :
				the_row();

				// Load sub field value.
				$image    = get_sub_field( 'member_pic' );
				$name     = get_sub_field( 'team_name' );
				$job      = get_sub_field( 'team_job' );
				$content  = get_sub_field( 'team_content' );
				$facebook = get_sub_field( 'facebook_url' );
				$twitter  = get_sub_field( 'twitter_url' );
				$gplus    = get_sub_field( 'gplus_url' );
				$linkedin = get_sub_field( 'linkedin_url' );

				$image_html   = '';
				$social_icons = '';
				$icons_html   = '';

				if ( $facebook ) {
					$social_icons = '<a class="w-5 h-5" href="' . $facebook . '" target="_blank">' . get_svg( 'icons/facebook', false ) . '</a>';
				}
				if ( $twitter ) {
					$social_icons .= '<a class="w-5 h-5" href="' . $twitter . '" target="_blank">' . get_svg( 'icons/twitter', false ) . '</a>';
				}
				if ( $gplus ) {
					$social_icons .= '<a class="w-7 h-7" href="' . $gplus . '" target="_blank">' . get_svg( 'icons/gplus', false ) . '</a>';
				}
				if ( $linkedin ) {
					$social_icons .= '<a class="w-5 h-5" href="' . $linkedin . '" target="_blank">' . get_svg( 'icons/linkedin', false ) . '</a>';
				}

				if ( $facebook || $twitter || $gplus || $linkedin ) {
					$icons_html = sprintf(
						'<div class="flex items-center justify-center space-x-8 bg-dark-blue-color/80 p-4 absolute -bottom-full group-hover:bottom-0 left-0 right-0 transition-all">
							%s
						</div>',
						$social_icons
					);
				}

				if ( $image || $name || $icons_html ) {
					$image_html = sprintf(
						'<div class="relative group overflow-hidden">
							<img class="w-full h-full sm:h-[462px] object-cover" src="%s" alt="%s">
							%s
						</div>',
						$image,
						$name,
						$icons_html
					);
				}

				printf(
					'<div class="flex flex-col text-center px-[15px]">
						%s
						<h3 class="text-1.5xl font-semibold text-dark-blue-color mt-11">%s</h3>
						<p class="text-light-text-color mt-1">%s</p>
						<p class="text-text-color mt-4">%s</p>
					</div>',
					$image_html, // phpcs:ignore.
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
