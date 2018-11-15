<div role="header" id="drBanner" class="stars">
	<div class="drUlogo">
		<a href="/"></a>
	</div>
	<div class="drUplanet">
	</div>
	<div class="drUniverse">
	</div>
	<?php if ( is_active_sidebar( 'site_header' ) ) : ?><div class="dr-universe-header-widgets"><?php dynamic_sidebar( 'site_header' ); ?></div><?php endif ?>
</div>
<nav class="main-menu">
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