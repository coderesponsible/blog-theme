<?php get_header(); ?>

	<section id="main" class="single-article">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="clearfix">
			<h1><?php the_title(); ?></h1>
			<?php /*<span class="author-name">by <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="author"><?php the_author() ?></a></span> */ ?>
			<div class="social-article">
				<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="CodeResponsible">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				<iframe class="facebook" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:90px; height:21px"></iframe>
			</div>
			<ul class="article-items">
				<li class="date"><span class="icon"></span><?php the_time('F jS, Y') ?></li>
				<li class="category"><a href="<?php bloginfo('url'); ?>/category/<?php $category = get_the_category(); echo $category[0]->cat_name; ?>"><span class="icon"></span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></a></li>
				<li class="comments"><a href="<?php comments_link(); ?>"><span class="icon"></span><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></li>
			</ul>
			<div class="content clearfix">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			</div>
			<div class="author clearfix">
				
				<div class="left">

					<?php echo get_avatar( get_the_author_meta('ID'), 90 ); ?>
					<p><a href="http://twitter.com/<?php the_author_yim(); ?>" class="twitter">@<?php the_author_yim(); ?></a></p>
					
					<p class="num-posts">
						<?php
							$post_count = the_author_posts();
							echo $post_count;
							if($post_count == 1){
								echo " Post";
							}else{
								echo " Posts";
							}
						?> 
					</p>
				</div>
				
				<div class="right">
					<h3><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="author"><?php the_author() ?></a></h3>
					<?php the_author_description(); ?> 
				</div>
				
			</div>

		</article>
		<div class="clearfix">
	<?php comments_template(); ?>
	</div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</section>
<?php get_sidebar(); ?>

<?php get_footer(); ?>