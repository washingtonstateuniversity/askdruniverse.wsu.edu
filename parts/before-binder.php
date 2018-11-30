<div id="drBanner" class="stars">
	<div class="drUlogo">
		<a href="/"></a>
	</div>
	<a href="#main-menu-toggle"
		role="button"
		id="main-menu-open"
		class="menu-open"
		aria-expanded="false"
		aria-controls="main-menu"
		aria-label="Open main menu">

		<span class="sr-only">Open main menu</span>
		<span class="fa fa-bars" aria-hidden="true"></span>
	</a>
	<nav id="main-menu-toggle" class="main-menu">
	<a href="#"
       role="button"
       id="main-menu-close"
       class="menu-close"
       aria-expanded="false"
       aria-controls="main-menu"
       aria-label="Close main menu">

      <span class="sr-only">Close main menu</span>
      <span class="fa fa-close" aria-hidden="true"></span>
    </a>
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
	<?php if ( is_active_sidebar( 'site_header' ) ) : ?>
	<a href="#site-header-widgets"
		role="button"
		id="site-header-widgets-open"
		class="site-header-widgets-open"
		aria-expanded="false"
		aria-controls="site-header-widgets"
		aria-label="Open Search">

		<span class="sr-only">Open Search</span>
	</a>
		<div id="site-header-widgets" class="dr-universe-header-widgets">
			<?php dynamic_sidebar( 'site_header' ); ?>
			<a href="#"
			role="button"
			id="site-header-widgets-close"
			class="site-header-widgets-close"
			aria-expanded="false"
			aria-controls="site-header-widgets"
			aria-label="Close Search">

			<span class="sr-only">Close Search</span>
			</a>
		</div>
	<?php endif ?>
</div>
