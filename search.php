<?php

get_header();

$main_class = 'spine-search-index';

?>

<main id="wsuwp-main" class="spine-search-index">

	test search

<?php

get_template_part( 'parts/headers' );

get_template_part( 'parts/search-layout', get_post_type() );

?>
<footer class="main-footer archive-footer">
	<section class="row side-right pager prevnext gutter">
		<div class="column one">
		<?php get_template_part( 'parts/pagination' ); ?>
		</div>
		<div class="column two">
			<!-- intentionally empty -->
		</div>
	</section><!--pager-->
</footer>

<?php get_template_part( 'parts/footers' ); ?>

</main>
<?php

get_footer();
