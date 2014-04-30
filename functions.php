<?php

add_shortcode( 'druni_mailchimp', 'druni_mailchimp_display' );

function druni_mailchimp_display() {
	ob_start();
	?>
	<!-- Begin MailChimp Signup Form -->
	<div id="mc_embed_signup"><form id="mc-embedded-subscribe-form" class="validate" action="http://wsu.us8.list-manage.com/subscribe/post?u=b2f74b8c89ecbda4a1f889759&amp;id=ee29e0ff6f" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank"><label for="mce-EMAIL">Stay up-to-date with Dr. Universe</label>
			<input id="mce-EMAIL" class="email" name="EMAIL" required="" type="email" value="" placeholder="email address" />
			<input id="mc-embedded-subscribe" class="button" name="subscribe" type="submit" value="Subscribe" />
			<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;"><input name="b_b2f74b8c89ecbda4a1f889759_ee29e0ff6f" type="text" value="" /></div>
		</form></div>
	<!--End mc_embed_signup-->
	<?php
	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}
add_shortcode( 'ucomm_asset_request', array( $this, 'ucomm_asset_request_display' ) );
