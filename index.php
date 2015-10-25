<?php get_header(); ?>
	
	<section id="main" class="articles col_9">
	<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<article class="row">
			<a href="<?php the_permalink() ?>" class="col_3">
				<?php echo first_thumnail(); ?>
			</a>
			<div class="article-content col_9">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php /*<p class="date"><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></p>*/ ?>
				<p><?php echo excerpt(35); ?></p>
			</div>
			<a href="<?php the_permalink() ?>" class="read-more">Read More</a>
		</article>	
	<?php endwhile; ?>
	<ul class="paging">
		<?php get_pagination()?>
	</ul>
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
