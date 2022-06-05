<?php
/**
 * Register Acf custom blocks here.
 *
 * @package OnepageStudio
 */

defined( 'WPINC' ) || exit;

/**
 * Main class for Blocks
 */
class OnepageStudio_Blocks {

	/**
	 * The Construct
	 */
	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_onepagestudio_blocks' ] );
	}

	/**
	 * Page Breadcrumb.
	 */
	public function register_onepagestudio_blocks() {

		// Early bail if function not exists.
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}

		// Register hero banner block.
		acf_register_block_type(
			[
				'name'            => 'hero_banner',
				'title'           => esc_html__( 'Hero Banner', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom hero banner block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/hero-banner.php',
				'category'        => 'formatting',
				'icon'            => 'cover-image',
				'mode'            => 'edit',
				'align'           => 'center',
				'keywords'        => [ 'hero', 'banner', 'jumbo' ],
			]
		);

		// Register our services block.
		acf_register_block_type(
			[
				'name'            => 'our_services',
				'title'           => esc_html__( 'Our Services', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom our services block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/our-services.php',
				'category'        => 'formatting',
				'icon'            => 'tag',
				'mode'            => 'edit',
				'keywords'        => [ 'services', 'what we do' ],
			]
		);

		// Register our work block.
		acf_register_block_type(
			[
				'name'            => 'our_work',
				'title'           => esc_html__( 'Our Work', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom our work block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/our-work.php',
				'category'        => 'formatting',
				'icon'            => 'welcome-write-blog',
				'mode'            => 'edit',
				'keywords'        => [ 'work', 'project' ],
			]
		);

		// Register our vision block.
		acf_register_block_type(
			[
				'name'            => 'our_vision',
				'title'           => esc_html__( 'Our Vision', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom our vision block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/our-vision.php',
				'category'        => 'formatting',
				'icon'            => 'welcome-view-site',
				'mode'            => 'edit',
				'keywords'        => [ 'vision' ],
			]
		);

		// Register our team block.
		acf_register_block_type(
			[
				'name'            => 'our_team',
				'title'           => esc_html__( 'Our Team', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom our team block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/our-team.php',
				'category'        => 'formatting',
				'icon'            => 'groups',
				'mode'            => 'edit',
				'keywords'        => [ 'team', 'advisor' ],
			]
		);

		// Register cta block.
		acf_register_block_type(
			[
				'name'            => 'cta',
				'title'           => esc_html__( 'CTA', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom call to action block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/cta.php',
				'category'        => 'formatting',
				'icon'            => 'button',
				'mode'            => 'edit',
				'keywords'        => [ 'cta', 'call to action' ],
			]
		);

		// Register testimonials block.
		acf_register_block_type(
			[
				'name'            => 'testimonials',
				'title'           => esc_html__( 'Testimonials', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom testimonials block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/testimonials.php',
				'category'        => 'formatting',
				'icon'            => 'admin-comments',
				'mode'            => 'edit',
				'keywords'        => [ 'testimonial', 'client' ],
			]
		);

		// Register counter block.
		acf_register_block_type(
			[
				'name'            => 'counter',
				'title'           => esc_html__( 'Counter', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom counter block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/counter.php',
				'category'        => 'formatting',
				'icon'            => 'hourglass',
				'mode'            => 'edit',
				'align'           => 'center',
				'keywords'        => [ 'counter' ],
			]
		);

		// Register contact us block.
		acf_register_block_type(
			[
				'name'            => 'contact',
				'title'           => esc_html__( 'Contact Us', 'onepagestudio' ),
				'description'     => esc_html__( 'A custom contact us block.', 'onepagestudio' ),
				'render_template' => 'template-parts/blocks/contact-us.php',
				'category'        => 'formatting',
				'icon'            => 'email-alt',
				'mode'            => 'edit',
				'keywords'        => [ 'contact', 'enquiry', 'get in touch' ],
			]
		);
	}

}

// Init.
new OnepageStudio_Blocks();
