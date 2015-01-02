<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<?php _e('This post is password protected. Enter the password to view comments.','html5reset'); ?>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<div class="comments-content">
		<h3 class="comments-header"><?php comments_number(__('No Comments','html5reset'), __('One Comment','html5reset'), __('% Comments','html5reset') );?></h3>

		<ol class="comments-list">
			<?php wp_list_comments(); ?>
		</ol>

		<div class="navigation">
			<div class="next-comments"><?php previous_comments_link('Next') ?></div>
			<div class="prev-comments"><?php next_comments_link('Prev') ?></div>
		</div>
	</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
		<!--p><php _e('Comments are closed.','html5reset'); ></p-->

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

	<div class="comments-respond <?php if ( have_comments() ) : ?>comments-respond-no-comments<?php endif; ?>" >

		<h3 class="comments-header"><?php comment_form_title( __('댓글 남기기','html5reset'), __('Leave a Reply to %s','html5reset') ); ?></h3>

		<div class="cancel-comments">
			<?php cancel_comment_reply_link(); ?>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<div class="comments-required-reg">
			<p> <?php _e('You must be','html5reset'); ?>
				<a href="<?php echo wp_login_url( get_permalink() ); ?>">
					<?php _e('logged in','html5reset'); ?>
				</a>
				<?php _e('to post a comment.','html5reset'); ?> </p>
		</div>
		<?php else : ?>
		<div class="comments-write">
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<div class="comments-userinfo">
				<?php if ( is_user_logged_in() ) : ?>
					<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
							<?php echo $user_identity; ?></a><?php _e('님으로 로그인함','html5reset'); ?>.
						<a class="comments-link-button" href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"
							>
							<?php _e('로그아웃','html5reset'); ?></a>
					</p>
				<?php else : ?>
					<p>이메일은 공개되지 않습니다. 필수 입력창은 <strong>*</strong> 로 표시되어 있습니다.</p>

					<div class="comments-input-info">
						<label for="author"><?php _e('이름','html5reset'); ?> <?php if ($req) echo "<strong>*</strong>"; ?></label></br>
						<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					</div>

					<div class="comments-input-info">
						<label for="email"><?php _e('메일','html5reset'); ?> <?php if ($req) echo "<strong>*</strong>"; ?></label></br>
						<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					</div>

					<div class="comments-input-info">
						<label for="url"><?php _e('웹사이트','html5reset'); ?></label></br>
						<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
					</div>

				<?php endif; ?>
				</div>

				<div>
					<?php if ( !is_user_logged_in() ) : ?>
						<label for="comment"><?php _e('댓글','html5reset'); ?></label>
					<?php endif; ?>
					<textarea  name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
				</div>

				<div class="comments-input-tags">
					<p>다음의 HTML 태그와 속성을 사용할 수 있습니다: <code><?php echo allowed_tags(); ?></code></p>
				</div>

				<div>
					<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('댓글 달기','html5reset'); ?>" />
					<?php comment_id_fields(); ?>
				</div>

				<?php do_action('comment_form', $post->ID); ?>

			</form>
		</div>
		<?php endif; // If registration required and not logged in ?>

	</div>

<?php endif; ?>
