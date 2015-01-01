<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
<aside id="sidebar">

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

		<div class="sidebar-widget widget_search" />
			<?php get_search_form('Search Here'); ?>
		</div>

		<div class="sidebar-widget widget_archive" />
			<h3 class="widget-title"><?php _e('Archives','html5reset'); ?></h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</div>

		<div class="sidebar-widget widget_meta" />
			<h3 class="widget-title"><?php _e('Meta','html5reset'); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.','html5reset'); ?>"><?php _e('WordPress','html5reset'); ?></a></li>
				<?php wp_meta(); ?>
			</ul>
		</div>

		<div class="sidebar-widget widget_subscribe" />
			<h3 class="widget-title"><?php _e('Subscribe','html5reset'); ?></h3>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)','html5reset'); ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)','html5reset'); ?></a></li>
			</ul>
		</div>
	
	<?php endif; ?>

	<script>
		$('.widget_search label').css("display", "none");
		$('.widget_search input[type="search"]').attr("placeholder", "Search here...");
		$('.widget_search input[type="text"]').attr("placeholder", "Search here...");

		$('.sidebar-widget .tagcloud a').css("font-size", "14px");
	</script>

</aside>