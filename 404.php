<?php

get_header();

$main_class = 'spine-search-index';

?>

<main id="wsuwp-main" class="spine-search-index">

	test search

<?php

get_template_part( 'parts/headers' );

?>

<section class="row single gutter pad-ends">

	<div class="column one">


		<h1>Oops 404, we couldn't find that.</h1>
		<div class="dr-universe-cloud unbound recto verso">
			<div class="dr-universe-cloud-bg">
			</div>
			<div class="dr-universe-cloud-text-wrapper">
				<?php if ( is_active_sidebar( 'not_found_text' ) ) : ?><div class="dr-universe-404-text-widgets"><?php dynamic_sidebar( 'not_found_text' ); ?></div><?php endif ?>
			</div>
		</div>
		

	</div><!--/column-->

</section>

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
