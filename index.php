<?php get_header(); ?>

<div class="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>

				<h3 class="postmeta space-under"><?php _e('By','marthaandtom');?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a> // <span class="grey"><?php printf( __('Posted <span class="orange">%1$s</span> in: %2$s','marthaandtom'), get_the_time(__('F j, Y', 'marthaandtom')), get_the_category_list(', ')) ;?></span></h3>

				<div class="entry">
					<?php the_content(__('Keep reading &raquo;', 'marthaandtom')); ?>
				</div>

				<p class="after-entry-links">
					<span class="orange"><?php just_comments_popup_link(__('No comments', 'marthaandtom'), __('1 comment', 'marthaandtom'), __('% comments', 'marthaandtom'), '','' ); ?></span>
					<?php the_tags( ' | <span class="grey">' . __('', 'marthaandtom') . ' ', ', ', '</span>'); ?>
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

<?php get_footer(); ?>
