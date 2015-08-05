		</div>
		<footer id="footer">
			<div class="footer-wrapper row">
				<div class="block col_4">
					<h3>About</h3>
					<?php $id=11; $post = get_page($id); $content = apply_filters('the_content', $post->post_content); echo $content; ?>
					<ul class="social-icons">
						<li><a href="http://feeds.feedburner.com/CodeResponsible" class="rss"><span>RSS</span></a></li>
						<li><a href="http://twitter.com/coderesponsible" class="twitter"><span>Twitter</span></a></li>
						<li><a href="http://facebook.com/coderesponsible" class="facebook"><span>Facebook</span></a></li>
					</ul>
				</div>
				<div class="block col_4">
					<h3>Recent Posts</h3>
					<ul class="recent-posts">
						<?php $recent = new WP_Query("showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="block col_4">
					<h4><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h4>
					<!--<p>&copy; <?php echo date("Y"); ?></p>-->
				</div>
			</div>
		</footer>
		<script src="<?php bloginfo('template_directory'); ?>/js/coderesponsible.min.js" type="text/javascript"></script>
	</body>
</html>