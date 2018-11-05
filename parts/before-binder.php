<div role="header" id="drBanner" class="stars">
	<div class="drUlogo">
		<a href="/"><img class="dr-logo" src="https://s3.wp.wsu.edu/uploads/sites/2332/2018/11/DrU-logo-2016.png" alt="Ask Dr. Universe logo" width="250" height"93"/></a>
	</div>
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
<div class="search-box">
</div>
