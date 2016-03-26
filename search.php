<?php get_header(); ?>

<div class="main">

	<?php if (have_posts()) : ?>
		<?php $post = $posts[0];  /*Hack. Set $post so that the_date() works*/?>

		<h1 class="pagetitle">Search results for '<?php the_search_query(); ?>'</h1>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">

				<?php
					if ( has_post_thumbnail() ) {?>
						<div class="archive-post-thumbnail">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(the_title_attribute('echo=0')); ?>">
							<?php set_post_thumbnail_size(250,166,true);
					    	the_post_thumbnail();?>
							</a>
						</div>
					<?php }
				?>

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

<?php get_footer(); ?>
