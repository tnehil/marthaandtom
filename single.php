<?php get_header(); ?>

<div class="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>

			<div class="entry">

				<?php the_content(); ?>

				<?php the_tags( '<p class="tags">' . __('Tags:', 'marthaandtom') . ' ', ', ', '</p>'); ?>

				<p class="post-info">
						This entry was posted by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
						<?php printf(__('%1$s on %2$s at %3$s and is filed under %4$s.', 'marthaandtom'), $time_since, get_the_time(__('l, F jS, Y', 'marthaandtom')), get_the_time(), get_the_category_list(', ')); ?>
						<?php printf(__("You can subscribe to responses to this entry via <a href='%s'>RSS</a>.", "marthaandtom"), get_post_comments_feed_link()); ?>
				</p>

			</div>
		</div>

		<div class="postnavigation clearfix">
			<span class="alignleft"><?php previous_post_link('&laquo;&emsp;%link') ?></span>
			<span class="alignright"><?php next_post_link('%link&emsp;&raquo;') ?></span>
		</div>


	<?php comments_template('/comments.php',true); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Tragically, the post you were looking for cannot be found. Try looking for something else?', 'marthaandtom'); ?></p>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
