<div class="wsuwp-content-syndicate-wrapper">
	<div class="wsuwp-content-syndicate-container">
		<?php
		$offset_x = 0;
		foreach ( $new_data as $content ) {
			if ( $offset_x < absint( $atts['offset'] ) ) {
				$offset_x++;
				continue;
			}

			$dr_title = ( isset( $content->question ) ) ? $content->question : $content->title;

			?>
			<div class="wsuwp-content-syndicate-full">
				<span class="content-item-title"><a href="<?php echo esc_url( $content->link ); ?>"><?php echo wp_kses_post( $dr_title ); ?></a></span>
				<div class="content-item-content">
					<?php echo wp_kses_post( $content->content ); ?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>