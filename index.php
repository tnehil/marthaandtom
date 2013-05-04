<?php get_header(); ?>

<div class="main">

	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
	
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
				
				<h3 class="postmeta"><?php _e('By','marthaandtom');?> <a href="/author/<?php the_author() ?>"><?php the_author() ?></a> // <span class="grey"><?php printf( __('Posted %1$s in: %2$s','marthaandtom'), get_the_time(__('j F, Y', 'marthaandtom')), get_the_category_list(', ')) ;?></span> &nbsp; <span class="orange"><?php just_comments_popup_link(__('No comments', 'marthaandtom'), __('1 comment', 'marthaandtom'), __('% comments', 'marthaandtom'), '','' ); ?></span></h3>	

				<div class="entry">
					<?php the_content(__('Keep reading &raquo;', 'marthaandtom')); ?>
				</div>
	
				<p class="tags">
					<?php the_tags('', ', ', ''); ?> <?php edit_post_link(__('Edit', 'minimalism'), ' | ', ''); ?>
				</p>
			</div>
	
		<?php endwhile; ?>
	
		<div class="postnavigation clearfix">
			<span class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'marthaandtom')) ?></span>
			<span class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'marthaandtom')) ?></span>
		</div>
	
	<?php else : ?>
		<h2><?php _e('Not Found', 'marthaandtom'); ?></h2>
		<p><?php _e('Tragically, the page you were looking for cannot be found. Try looking for something else?', 'marthaandtom'); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>