<div id="sidebar" class="col_3">
	<div class="split">
		<h3>Newsletter Sign-up</h3>
		<form id="email-signup" class="clearfix">
			<fieldset>
				<span class="error-message"></span>
				<label for="email-address">Email:</label><input type="email" name="email" id="email-address">
				<button class="email-submit">Submit</button>
			</fieldset>
		</form>
		<ul class="block social-icons">
			<li><a href="http://feeds.feedburner.com/CodeResponsible" class="rss"><span>RSS</span></a></li>
			<li><a href="http://twitter.com/coderesponsible" class="twitter"><span>Twitter</span></a></li>
			<li><a href="http://facebook.com/coderesponsible" class="facebook"><span>Facebook</span></a></li>
		</ul>
	</div>
	<div class="split">
		<h3>Recent Posts</h3>
		<ul class="recent-posts">
			<?php $recent = new WP_Query("showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
			<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
	</div>
</div>