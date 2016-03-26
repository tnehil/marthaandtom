		<div class="footer">
			<div class="footer-nav">
				Browse archives by

				Month:
				<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
				  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
				  <?php wp_get_archives( 'type=monthly&format=option&show_post_count=1' ); ?>
				</select>

				Category:
				<?php $args = array(
					show_option_none	 => 'Select Category',
					'orderby'            => 'NAME',
					'show_count'         => 1,
				); ?>
				<?php wp_dropdown_categories( $args ); ?>

			</div>

			<p>
				<?php _e('&#169; Martha Garc&eacute;s and Tom Nehil. All Rights Reserved.'); ?>
				<?php printf(__('%1$s and %2$s.', 'marthaandtom'), '<a href="' . get_bloginfo('rss2_url') . '">' . __('Entries (RSS)', 'marthaandtom') . '</a>', '<a href="' . get_bloginfo('comments_rss2_url') . '">' . __('Comments (RSS)', 'marthaandtom') . '</a>'); ?>
			</p>
		</div>
		<?php
			/* Always have wp_footer() just before the closing </body>
			 * tag of your theme, or you will break many plugins, which
			 * generally use this hook to reference JavaScript files.
			 */

			wp_footer();
		?>

		<!-- Google Analytics-->
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try {
			var pageTracker = _gat._getTracker("UA-7422160-1");
			pageTracker._trackPageview();
			} catch(err) {}

			var dropdown = document.getElementById("cat");
			function onCatChange() {
				if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
					location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
				}
			}
		dropdown.onchange = onCatChange;
		</script>
	</body>
</html>
