<?php
/**
 * The template part for displaying Main menu in header.
 *
 * @package OnepageStudio
 */

$nav = new OnepageStudio_Menu_Walker( 'main-menu' );
?>

<nav class="hidden xl:block"><?php echo $nav->build_menu(); // phpcs:ignore ?></nav>
