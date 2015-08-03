<?php


get_header();
?>

	<section class="articles col_9">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h1><?php single_cat_title(); ?></h1>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1>Archive for <?php the_time('F, Y'); ?></h1>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1>Archive for <?php the_time('Y'); ?></h1>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<?php $author = get_userdata( get_query_var('author') );?>
		<h1>Articles by <?php echo $author->display_name;?></h1>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1>Blog Archives</h1>
 	  <?php } ?>


		<?php while (have_posts()) : the_post(); ?>
			<?php
				$category = get_the_category();
			?>
			<article class="clearfix row">
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
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2>Oops, it doesn't looks as though there are any posts in the %s section yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
