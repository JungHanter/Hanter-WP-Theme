<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>	<!-- 헤더 파일 -->
	<div id="container">
		<div id="main-content">
			<section id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article <?php post_class('post-entry'); ?> id="post-<?php the_ID(); ?>">

						<div class="post-entry-inner">
							<div class="entry-header">
								<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								<!-- permalink - 고유주소 : 글/페이지 자동 연결 -->
							</div>

							<div class="entry-info" >
								<?php posted_on(); ?> <span class="separator"> | </span>
								<?php comments_popup_link(__('No Comments','html5reset'), __('1 Comment','html5reset'), __('% Comments','html5reset')); ?>
							</div>

							<div class="entry-content">
								<?php the_content(); ?> <!-- 글/페이지 내용 -->
							</div>

							<div class="entry-meta">
								<div class="entry-category"><?php _e('Posted in','html5reset'); ?> <?php the_category(', ') ?></div>
								<div class="entry-tags"><?php the_tags(__('Tags: ','html5reset'), ' '); ?></div>
							</div>
						</div>

					</article>
				<?php endwhile; ?>

				<?php post_navigation(); ?>

				<?php else : ?>
					<h2><?php _e('Nothing Found','html5reset'); ?></h2>
				<?php endif; ?>

			</section> <!-- end of content -->

			<?php get_sidebar(); ?>

		</div> <!-- end of main-content -->
	</div> <!-- end of container -->

<?php get_footer(); ?>
