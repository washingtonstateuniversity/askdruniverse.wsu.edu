<section class="row side-right gutter pad-ends">

	<div class="column one">

		<?php get_template_part( 'parts/search/search-bar' ); ?>

		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'articles/search', get_post_type() ); ?>

		<?php endwhile; ?>

		<?php else : ?>

			<div class="dr-search-empty-results">
				Sorry, no results found.
			</div>

		<?php endif; ?>

	</div><!--/column-->

	<div class="column two">

		<?php if ( is_active_sidebar( 'search_sidebar' ) ) {

			dynamic_sidebar( 'search_sidebar' );

		} ?>

	</div><!--/column two-->

</section>
