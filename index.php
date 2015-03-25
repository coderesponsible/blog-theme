<?php get_header(); ?>
	
	<section id="main" class="articles col_9">
	<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<article class="clearfix row">
			<a href="<?php bloginfo('url'); ?>/category/<?php $category = get_the_category(); echo $category[0]->cat_name; ?>" class="article-cat"><?php $category = get_the_category(); echo $category[0]->cat_name; ?><span class="cat-tri"></span></a>
			<a href="<?php the_permalink() ?>" class="col_3">
				<?php echo first_thumnail(); ?>
			</a>
			<div class="article-content col_9">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><a href="<?php comments_link(); ?>" class="comments-num"><?php comments_number( '0', '1', '%' ); ?></a></h2>
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
