<?php get_header(); ?>

<div class="main">

	<?php if (have_posts()) : ?>
		<?php $post = $posts[0];  /*Hack. Set $post so that the_date() works*/?> 
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h1 class="pagetitle"><?php printf(__('%s', 'marthaandtom'), single_cat_title('', false)); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h1 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'marthaandtom'), single_tag_title('', false) ); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1 class="pagetitle"><?php printf(_c('Archive for %s', 'marthaandtom'), get_the_time(__('F jS, Y', 'marthaandtom'))); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1 class="pagetitle"><?php printf(_c('Archive for %s', 'marthaandtom'), get_the_time(__('F, Y', 'marthaandtom'))); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1 class="pagetitle"><?php printf(_c('Archive for %s', 'marthaandtom'), get_the_time(__('Y', 'marthaandtom'))); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1 class="pagetitle"><?php printf(__('Posts by', 'marthaandtom'),the_author()); ?></h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1 class="pagetitle"><?php _e('Archives', 'marthaandtom'); ?></h1>
		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
	
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
				
				<h3 class="postmeta"><?php if (!is_author()) : _e('By','marthaandtom') ;?> <a href="<?php echo bloginfo('url') .'/'. the_author() ?>"><?php the_author() ?></a> // <?php endif;?> <span class="grey"><?php the_time(__('j F Y', 'marthaandtom')) ?> in: <?php echo get_the_category_list(', '); ?></span> &nbsp; <span class="orange"><?php comments_popup_link(__('No comments', 'marthaandtom'), __('1 comment', 'marthaandtom'), __('% comments', 'marthaandtom'), '','' ); ?></span></h3>	

				<div class="entry">
					<?php the_excerpt(__('Keep reading &raquo;', 'marthaandtom')); ?>
				</div>
	
				<div class="tags">
					<?php the_tags('', ', ', ''); ?> <?php edit_post_link(__('Edit', 'marthaandtom'), ' | ', ''); ?>
				</div>
			</div>
	
		<?php endwhile; ?>

		<div class="postnavigation clearfix">
			<span class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'marthaandtom')); ?></span>
			<span class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'marthaandtom')); ?></span>
		</div>

	<?php else : ?>
		<h2 class="center"><?php _e('Not Found', 'marthaandtom'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>