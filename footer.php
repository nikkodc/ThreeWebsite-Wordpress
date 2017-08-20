
<footer class="footer">
	<img src="<?php echo get_template_directory_uri(); ?>/images/footer_35.jpg" class="footer-image" >
	<div class="footer_container">
		<div class="social_media">
	        <i class="fa fa-twitter"></i>
	        <i class="fa fa-facebook-square"></i>
	        <i class="fa fa-dribbble"></i>
	        <i class="fa fa-instagram"></i>
	        <i class="fa fa-youtube-play"></i>
	        <i class="fa fa-skype"></i>
	        <i class="fa fa-envelope"></i>
	    </div>
	    <hr>
		<nav class="menu_footer">
			<?php 
			$args = array(
				'theme_location' => 'footer'
			);
			?>
			<?php wp_nav_menu($args); ?>
		</nav>
		<hr>
		<p>
			Copyright &copy; 2017 Three Studio. All rights reserved.<br>Please do not copy any works that you see on this website.
		</p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>