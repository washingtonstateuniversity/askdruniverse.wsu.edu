<div role="header" id="drBanner" class="stars">
	<div class="drUlogo">
		<a href="/"></a>
	</div>
	<a href="#main-menu"
		role="button"
		id="main-menu-toggle"
		class="menu-toggle"
		aria-expanded="false"
		aria-controls="main-menu"
		aria-label="Open main menu">

		<span class="sr-only">Open main menu</span>
		<span class="fa fa-bars" aria-hidden="true"></span>
	</a>
	<nav id="main-menu" class="main-menu">
	<?php
		$spine_site_args = array(
			'theme_location'  => 'site',
			'menu'            => 'site',
			'container'       => false,
			'container_class' => false,
			'container_id'    => false,
			'menu_class'      => null,
			'menu_id'         => null,
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 3,
		);
		wp_nav_menu( $spine_site_args ); ?>
	</nav>
	<a href="#site-header-widgets"
		role="button"
		id="site-header-widgets-toggle"
		class="site-header-widgets-toggle"
		aria-expanded="false"
		aria-controls="site-header-widgets"
		aria-label="Open Search">

		<span class="sr-only">Open Search</span>
		<span class="fa fa-bars" aria-hidden="true"></span>
	</a>
	<?php if ( is_active_sidebar( 'site_header' ) ) : ?><div id="site-header-widgets" class="dr-universe-header-widgets"><?php dynamic_sidebar( 'site_header' ); ?></div><?php endif ?>
</div>
