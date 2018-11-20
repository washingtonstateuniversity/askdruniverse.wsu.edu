<tr class="form-field term-group-wrap">
	<th scope="row">
	<label for="taxonomy-image-id">Image</label>
	</th>
	<td>
	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
	<div id="taxonomy-image-wrapper">
		<?php if ( $image_id ) : ?><?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?><?php endif; ?>
	</div>
	<p>
		<input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="Add Image" />
		<input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="Remove Image" />
	</p>
	<?php wp_nonce_field( 'add-taxonomy-media', 'taxonomy_media' ); ?>
	</td>
</tr>
