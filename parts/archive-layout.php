<?php if ( ! is_front_page() && ! is_home() && spine_display_breadcrumbs( 'bottom' ) ) {
	?><section class="row single breadcrumbs breadcrumbs-bottom gutter pad-top" typeof="BreadcrumbList" vocab="http://schema.org/">
	<div class="column one"><?php bcn_display(); ?></div>
	</section><?php
} ?>
<section class="row single gutter pad-ends">

	<div class="column one">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'articles/post', get_post_type() ); ?>

		<?php endwhile; ?>

	</div><!--/column-->

</section>
