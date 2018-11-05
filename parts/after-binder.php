<footer role="footer" class="main-foot equalize">
<nav class="footer-menu">
<?php
	$spine_site_args = array(
		'theme_location'  => 'site',
		'menu'            => 'footer',
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
<div class="footer-description">
	<?php
		$my_postid = 304;//This is page id or post id
		$content_post = get_post($my_postid);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	?>
</div>
<div id="site-copyright">
	<?php
	$my_postid = 306;//This is page id or post id
	$content_post = get_post($my_postid);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
	?>
</div>
<div class="wsu-logo">
	<a title="Washington State University" href="http://www.wsu.edu"><img src="https://s3.wp.wsu.edu/uploads/sites/2332/2018/11/WSU-Logo-Primary_WHITE.png" width="288px" height="90px" alt="Washington State University" /></a>
</div>
</footer>
