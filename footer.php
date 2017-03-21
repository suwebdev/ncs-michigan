<?php
/***************************************/
/*	Close  head line if woocommerce available
/***************************************/
$michigan_webnus_options = michigan_webnus_options();

if( isset($post) ){
	if( 'product' == get_post_type( $post->ID )){
		echo '</section>';
	}
}
$footer_show = true;

if(isset($post)){
	$footer_show = rwmb_meta( 'michigan_footer_show' );
}

if($michigan_webnus_options['michigan_webnus_footer_twitter_bar']){
	$output = do_shortcode('
		[twitterfeed
			username				= "' . $michigan_webnus_options['michigan_webnus_footer_twitter_username'] . '"
			access_token			= "' . $michigan_webnus_options['michigan_webnus_footer_twitter_access_token'] . '"
			access_token_secret		= "' . $michigan_webnus_options['michigan_webnus_footer_twitter_access_token_secret'] . '"
			consumer_key			= "' . $michigan_webnus_options['michigan_webnus_footer_twitter_consumer_key'] . '"
			consumer_secret			= "' . $michigan_webnus_options['michigan_webnus_footer_twitter_consumer_secret'] . '"
			count					= "' . $michigan_webnus_options['michigan_webnus_footer_twitter_count'] . '"
		]
	');
	echo $output;
}
$is_buddy = is_plugin_active('buddypress/bp-loader.php')?  !bp_is_blog_page() : '' ;
if ( $footer_show || is_archive() || is_single() || is_home() || $is_buddy || is_search() ) : ?>
<section id="pre-footer">
<?php //start footer bars
if($michigan_webnus_options['michigan_webnus_footer_instagram_bar']){
	get_template_part('parts/instagram-bar');
}
if($michigan_webnus_options['michigan_webnus_footer_social_bar']){
	get_template_part('parts/social-bar');
}
if($michigan_webnus_options['michigan_webnus_footer_contact_info']){
	get_template_part('parts/footer-contact-info');
}
if($michigan_webnus_options['michigan_webnus_footer_subscribe_bar']){
	get_template_part('parts/subscribe-bar');
}
?>
</section>
	<footer id="footer" <?php if( $michigan_webnus_options['michigan_webnus_footer_color'] == 2 ) echo 'class="litex"';?>>
	<section class="container footer-in">
	<div class="row">
	<?php $footer_type = $michigan_webnus_options['michigan_webnus_footer_type'];
	switch($footer_type){
	case 1: ?>
	<div class="col-md-4"><ul><?php if(is_active_sidebar('footer-section-1')) dynamic_sidebar('footer-section-1'); ?></ul></div>
	<div class="col-md-4"><ul><?php if(is_active_sidebar('footer-section-2')) dynamic_sidebar('footer-section-2'); ?></ul></div>
	<div class="col-md-4"><ul><?php if(is_active_sidebar('footer-section-3')) dynamic_sidebar('footer-section-3'); ?></ul></div>
	<?php break;
	case 2: ?>

	<!-- 4 GRID FOOTER BEING USED -->

	<div class="col-md-3"><ul>
		<div class="textwidget">
			<img id="footerlogo" alt src="https://upload.wikimedia.org/wikipedia/commons/2/23/Seattle_redhawks_logo.png">
		</div>
	<?php if(is_active_sidebar('footer-section-1')) dynamic_sidebar('footer-section-1'); ?></ul></div>
	<div class="col-md-3"><ul>
		<li id="text-3" class="widget widget_text">
			<h5 class="subtitle">CONTACT</h5>
			<div class="textwidget">
				901 12th Ave, LSAX 420
				<br>
				Seattle, WA 98122-1090
				<br>
				<br>
				(206) 296-5530
				<br>
				ncs_admissions@seattleu.edu
				<br>
				<br>
			</div>
		</li>
	<?php if(is_active_sidebar('footer-section-2')) dynamic_sidebar('footer-section-2'); ?></ul></div>
	<div class="col-md-3"><ul>
		<li id="nav_menu-2" class="widget widget_nav_menu">
			<h5 class="subtitle">QUICKLINKS</h5>
				<a href="#">About</a>
				<br>
				<a href="#">Info Center</a>
				<br>
				<a href="#">Events</a>
				<br>
				<a href="#">Student Success</a>
				<br>
				<a href="#">Programs & Coursesr</a>
		</li>
	<?php if(is_active_sidebar('footer-section-3')) dynamic_sidebar('footer-section-3'); ?></ul></div>
	<div class="col-md-3"><ul>
		<a href="#" class="button theme-skin square medium">APPLY NOW
		</a>
		<a href="#" class="button theme-skin square medium">REQUEST INFORMATION
		</a>

	<?php if(is_active_sidebar('footer-section-4')) dynamic_sidebar('footer-section-4'); ?></ul></div>
	<?php break;
	case 3: ?>
	<div class="col-md-6"><ul><?php if(is_active_sidebar('footer-section-1')) dynamic_sidebar('footer-section-1'); ?></ul></div>
	<div class="col-md-3"><ul><?php if(is_active_sidebar('footer-section-2')) dynamic_sidebar('footer-section-2'); ?></ul></div>
	<div class="col-md-3"><ul><?php if(is_active_sidebar('footer-section-3')) dynamic_sidebar('footer-section-3'); ?></ul></div>
	<?php break;
	case 4: ?>
	<div class="col-md-3"><ul><?php if(is_active_sidebar('footer-section-1')) dynamic_sidebar('footer-section-1'); ?></ul></div>
	<div class="col-md-3"><ul><?php if(is_active_sidebar('footer-section-2')) dynamic_sidebar('footer-section-2'); ?></ul></div>
	<div class="col-md-6"><ul><?php if(is_active_sidebar('footer-section-3')) dynamic_sidebar('footer-section-3'); ?></ul></div>
	<?php break;
	case 5: ?>
	<div class="col-md-6"><ul><?php if(is_active_sidebar('footer-section-1')) dynamic_sidebar('footer-section-1'); ?></ul></div>
	<div class="col-md-6"><ul><?php if(is_active_sidebar('footer-section-2')) dynamic_sidebar('footer-section-2'); ?></ul></div>
	<?php break;
	case 6: ?>
	<div class="col-md-12"><ul><?php if(is_active_sidebar('footer-section-1')) dynamic_sidebar('footer-section-1'); ?></ul></div>
	<?php break;
	 } ?>
	 </div>
	 </section>
	<!-- end-footer-in -->
	<?php if( $michigan_webnus_options['michigan_webnus_footer_bottom_enable'] )
		get_template_part('parts/footer','bottom'); ?>
	<!-- end-footbot -->
	</footer>
	<!-- end-footer -->
<?php endif; ?>
<?php if($michigan_webnus_options['michigan_webnus_scrollup'])
	echo '<span id="scroll-top"><a class="scrollup"><i class="fa-chevron-up"></i></a></span>';
?>

</div>
<!-- end-wrap -->
<!-- End Document
================================================== -->
<?php

echo $michigan_webnus_options['michigan_webnus_space_before_body'];

wp_footer(); ?>
</body>
</html>