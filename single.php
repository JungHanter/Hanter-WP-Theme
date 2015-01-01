<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

	<div id="container">
		<div id="main-content">
			<section id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article <?php post_class('entry-single'); ?> id="post-<?php the_ID(); ?>">
						<div class="entry-single-inner">

							<h1 class="entry-title"><?php the_title(); ?></h1>


							<?php the_content(); ?>

							<?php wp_link_pages(array('before' => __('Pages: ','html5reset'), 'next_or_number' => 'number')); ?>

							<?php the_tags( __('Tags: ','html5reset'), ', ', ''); ?>

							<?php posted_on(); ?>


							<?php edit_post_link(__('Edit this entry','html5reset'),'','.'); ?>

							<?php comments_template(); ?>

						</div>
					</article>
				<?php endwhile; endif; ?>

				<?php post_navigation(); ?>
			</section> <!-- end of content -->

			<?php get_sidebar(); ?>

		</div> <!-- end of main-content -->
	</div> <!-- end of container -->

<?php get_footer(); ?>