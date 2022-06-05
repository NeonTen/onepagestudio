<?php
/**
 * The template-part for displaying Navigation in header
 *
 * @package OnepageStudio
 */

?>

<div class="overlay bg-black/50 fixed inset-0 hidden"></div>

<!-- Main Navigation -->
<nav id="site-navigation" class="main-navigation">
	<div class="hamberger w-10 h-10 cursor-pointer lg:hidden">
		<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Menu</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
	</div>
	<nav class="hidden lg:block">
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'main-menu',
				'menu_id'        => 'primary-menu',
				'container'      => 'ul',
				'menu_class'     => 'flex space-x-10 xl:space-x-14',
			]
		);
		?>
	</nav>

</nav><!-- #site-navigation -->

<!-- Mobile Navigation -->
<div class="mobile-menu w-[300px] h-screen text-dark-blue-color bg-white border-l border-black/50 p-6 fixed top-0 right-0 translate-x-full">
	<div class="close w-8 h-8 absolute top-3 right-3 cursor-pointer">
		<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Close</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
	</div>
	<nav>
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'main-menu',
				'menu_id'        => 'primary-menu',
				'container'      => 'ul',
				'menu_class'     => 'grid gap-2',
			]
		);
		?>
	</nav>
</div>
