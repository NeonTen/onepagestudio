<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnepageStudio
 */

?>
<!doctype html>
<html class="scroll-smooth" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="main-content w-full max-w-full">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'onepagestudio' ); ?></a>

	<?php theme_header_html(); ?>

	<?php
	/**
	 * Add content after header.
	 */
	do_action( 'onepagestudio_after_header' );
	?>
