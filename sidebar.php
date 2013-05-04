<ul class="sidebar">
	<?php get_search_form(); ?>
	<?php if ( !dynamic_sidebar() ) : ?>
		<li>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</li>
		
		<li>
			<h2>Archives</h2>
			<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
			  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
			  <?php wp_get_archives( 'type=monthly&format=option&show_post_count=1' ); ?>
			</select>
		</li>
		
		<li>
			<?php wp_list_categories('show_count=1&title_li=<h2>' . 'Categories' . '</h2>'); ?>
		</li>
		
		<li>
			<h2>By Author</h2>
			<ul>
				<?php wp_list_authors('exclude_admin=0&optioncount=1'); ?>
			</ul>
		</li>
			
	<?php endif; ?>
	
</ul>