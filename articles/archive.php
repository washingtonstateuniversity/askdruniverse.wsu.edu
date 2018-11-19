<?php $post_share_placement = spine_get_option( 'post_social_placement' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! strstr( $post->post_content, '<h1>' ) ) : ?>
	<header class="article-header">
		<h1 class="article-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
	</header>
	<?php endif ?>
	<div class="article-summary">
		<?php 
		if ( strstr( $post->post_content, '<!--more-->' ) ) {
		
			// Get content parts
			$content_parts = get_extended( $post->post_content );

			echo apply_filters( $content_parts['main'] );

		} else {

			the_excerpt();

		}; ?>
	</div>
	<footer class="article-footer">
		<?php
		if ( is_singular() && in_array( $post_share_placement, array( 'bottom', 'both' ) ) ) {
			get_template_part( 'parts/share-tools' );
		}
		?>
	<?php
	// Display site level categories attached to the post.
	if ( has_category() ) {
		echo '<dl class="categorized">';
		echo '<dt><span class="categorized-default">Categorized</span></dt>';
		foreach ( get_the_category() as $category ) {
			echo '<dd><a href="' . get_category_link( $category->cat_ID ) . '">' . $category->cat_name . '</a></dd>';
		}
		echo '</dl>';
	}

	// Display University categories attached to the post.
	if ( taxonomy_exists( 'wsuwp_university_category' ) && has_term( '', 'wsuwp_university_category' ) ) {
		$university_category_terms = get_the_terms( get_the_ID(), 'wsuwp_university_category' );
		if ( ! is_wp_error( $university_category_terms ) ) {
			echo '<dl class="university-categorized">';
			echo '<dt><span class="university-categorized-default">Categorized</span></dt>';

			foreach ( $university_category_terms as $term ) {
				$term_link = get_term_link( $term->term_id, 'wsuwp_university_category' );
				if ( ! is_wp_error( $term_link ) ) {
					echo '<dd><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></dd>';
				}
			}
			echo '</dl>';
		}
	}

	// Display University tags attached to the post.
	if ( has_tag() ) {
		echo '<dl class="tagged">';
		echo '<dt><span class="tagged-default">Tagged</span></dt>';
		foreach ( get_the_tags() as $tag ) {
			echo '<dd><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></dd>';
		}
		echo '</dl>';
	}

	// Display University locations attached to the post.
	if ( taxonomy_exists( 'wsuwp_university_location' ) && has_term( '', 'wsuwp_university_location' ) ) {
		$university_location_terms = get_the_terms( get_the_ID(), 'wsuwp_university_location' );
		if ( ! is_wp_error( $university_location_terms ) ) {
			echo '<dl class="university-location">';
			echo '<dt><span class="university-location-default">Location</span></dt>';

			foreach ( $university_location_terms as $term ) {
				$term_link = get_term_link( $term->term_id, 'wsuwp_university_location' );
				if ( ! is_wp_error( $term_link ) ) {
					echo '<dd><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></dd>';
				}
			}
			echo '</dl>';
		}
	}

	// If a user has filled out their description and this is a multi-author blog, show a bio on their entries.
	if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
		<div class="author-info">
			<div class="author-avatar">
				<?php
				/** This filter is documented in author.php */
				$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
				echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				?>
			</div><!-- .author-avatar -->
			<div class="author-description">
				<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
				<p><?php the_author_meta( 'description' ); ?></p>
				<?php if ( '1' === spine_get_option( 'show_author_page' ) ) : ?>
				<div class="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
					</a>
				</div><!-- .author-link	-->
				<?php endif; ?>
			</div><!-- .author-description -->
		</div><!-- .author-info -->
	<?php endif; ?>
	</footer><!-- .entry-meta -->

</article>