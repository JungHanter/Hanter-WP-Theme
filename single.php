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

							<div class="entry-header">
								<h1 class="entry-title"><?php the_title(); ?></h1>

								<div class="entry-info" >
									<?php posted_on(); ?> <span class="separator"> | </span>
									<?php comments_popup_link(__('No Comments','html5reset'), __('1 Comment','html5reset'), __('% Comments','html5reset')); ?>
								</div>

								<div class="entry-meta">
									<div class="entry-category"><?php _e('Posted in','html5reset'); ?> <?php the_category(', ') ?></div>
									<div class="entry-tags"><?php the_tags(__('Tags: ','html5reset'), ' '); ?></div>
								</div>
							</div>


							<div class="entry-content">
								<?php the_content(); ?> <!-- 글/페이지 내용 -->

								<div class="entry-post-edit">
									<?php edit_post_link(__('Edit','html5reset'),'','.'); ?>
								</div>
							</div>
						</div>

						<?php wp_link_pages(array('before' => __('Pages: ','html5reset'), 'next_or_number' => 'number')); ?>

					</article>

					<div class="entry-comments">
						<div class="entry-comments-inner">
							<?php comments_template(); ?>
						</div>
					</div>

				<?php endwhile; endif; ?>

				<!--?php post_navigation(); ?-->
			</section> <!-- end of content -->

			<?php get_sidebar(); ?>

		</div> <!-- end of main-content -->
	</div> <!-- end of container -->

<?php get_footer(); ?>