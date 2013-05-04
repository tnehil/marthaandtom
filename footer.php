		<div class="footer">
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
		</script>
	</body>
</html>