<section class="row single gutter pad-ends">

	<div class="column one">

		<?php if ( have_posts() ) : ?>

			<h1>Here are your search results for <span><?php echo get_search_query(); ?></span></h1>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'articles/search', get_post_type() ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<h1>Sorry, we couldn't find anything for <span><?php echo get_search_query(); ?></span></h1>
			<div class="dr-universe-empty-search">
				<div class="dr-universe-empty-search-bg">
				</div>
				<div class="dr-universe-empty-search-text-wrapper">
					<?php if ( is_active_sidebar( 'search_text' ) ) : ?><div class="dr-universe-search-text-widgets"><?php dynamic_sidebar( 'search_text' ); ?></div><?php endif ?>
				</div>
			</div>
		<?php endif; ?>

	</div><!--/column-->

</section>
