<?php
namespace WSU\askdruniverse\Content_Syndicate;
add_filter( 'wsuwp_content_syndicate_json_output', 'WSU\askdruniverse\Content_Syndicate\wsuwp_json_output', 10, 3 );
/**
 * Provide fallback URLs if thumbnail sizes have not been generated
 * for a post pulled in with content syndicate.
 *
 * @since 0.0.2
 *
 * @param \stdClass $content
 *
 * @return string
 */
function get_image_url( $content ) {
	// If no embedded featured media exists, use the full thumbnail.
	if ( ! isset( $content->featured_media )
		|| ! isset( $content->featured_media->media_details )
		|| ! isset( $content->featured_media->media_details->sizes ) ) {
		return $content->thumbnail;
	}
	$sizes = $content->featured_media->media_details->sizes;
	if ( isset( $sizes->{'spine-medium_size'} ) ) {
		return $sizes->{'spine-medium_size'}->source_url;
	}
	if ( isset( $sizes->{'spine-small_size'} ) ) {
		return $sizes->{'spine-small_size'}->source_url;
	}
	if ( isset( $sizes->{'full'} ) ) {
		return $sizes->{'full'}->source_url;
	}
	return $content->thumbnail;
}
/**
 * Provide custom output for the wsuwp_json shortcode.
 *
 * @since 0.0.2
 *
 * @param string $content
 * @param array  $data
 * @param array  $atts
 *
 * @return string
 */
function wsuwp_json_output( $content, $data, $atts ) {
	// Provide a default output for cases where no `output` attribute is included.
	if ( 'json' === $atts['output'] ) {
		ob_start();
		?>
		<div class="deck">
		<?php
		$offset_x = 0;
		foreach ( $data as $content ) {
			if ( $offset_x < absint( $atts['offset'] ) ) {
				$offset_x++;
				continue;
			}
			?>
			<article class="card">

				<?php if ( ! empty( $content->thumbnail ) ) { ?>
				<?php $image_url = get_image_url( $content ); ?>
				<figure class="card-image"
						style="background-image: url(<?php echo esc_url( $image_url ); ?>">
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $content->featured_media->alt_text ); ?>">
				</figure>
				<?php } ?>

				<div class="card-content">

					<header class="card-title">
						<a href="<?php echo esc_url( $content->link ); ?>"><?php echo esc_html( $content->title ); ?></a>
					</header>

					<div class="card-excerpt">
						<?php echo wp_kses_post( $content->excerpt ); ?>
					</div>

					<div class="card-cta">
						<a href="<?php echo esc_url( $content->link ); ?>">Read more</a>
					</div>

				</div>

			</article>
<?php
		}
?>
		</div>
<?php
		$content = ob_get_clean();
	}
	return $content;
}
?>
 <?php
}
