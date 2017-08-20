<?php
 // 	CHECK IF REQUIRED TO SEEN
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<!-- IF HAVE COMMENTS -->
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			// FORMATIC STRING
				printf(
					// hybrid function, input diff format, singular plural
												//left and right double quote
					//first param=singular srting plural string
					esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title','ThreeWebsite' )),
					// number format
					number_format_i18n(get_comments_number()),
					'<span>'.get_the_title().'</span>'
				);
				 // printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentyfifteen' ),
				 // 	number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>
		
		<!-- MORE COMMENTS PAGINATION-->
		<?php if(get_comment_pages_count()>1 && get_option('page_comments') ): ?>
			
			<nav id="comment-nav-top" class="comment-navigation" role="navigation">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="post-link-nav">
								<!-- inject whatever value inside w/o echoing -->
							<?php previous_comments_link(esc_html__('Older comments','ThreeWebsite')) ?>
						</div>							
					</div>
					<div class="col-xs-12 col-sm-6 text-right">
						<div class="post-link-nav">
							<?php next_comments_link(esc_html__('Newer comments','ThreeWebsite')) ?>
						</div>
					</div>`
				</div>
			</nav>

		<?php endif; ?>

		<!-- GENERATE COMMENTS SECTION -->
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'walker'		=> null,
					'max_depth'		=> '',		
					'style'			=> 'ol',
					'callback'		=> null,
					'end-callback'	=> null,
					'type'			=> 'all',
					'reply_text'	=> 'Reply',
					'page'			=> '',
					'per_page'		=> '',
					'reverse_top_level' => null,
					'reverse_children'	=> '',	
					'short_ping'	=> false,
					'avatar_size'	=> 56,
					'echo'			=> true, // SEE ALL COMMENTERS
				) );
			?>
		</ol><!-- .comment-list -->
		
		<!-- MORE COMMENTS PAGINATION BOTTOM-->
		<?php if(get_comment_pages_count()>1 && get_option('page_comments') ): ?>
			
			<nav id="comment-nav-bottom" class="comment-navigation" role="navigation">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="post-link-nav">
								<!-- inject whatever value inside w/o echoing -->
							<?php previous_comments_link(esc_html__('Older comments','ThreeWebsite')) ?>
						</div>							
					</div>
					<div class="col-xs-12 col-sm-6 text-right">
						<div class="post-link-nav">
							<?php next_comments_link(esc_html__('Newer comments','ThreeWebsite')) ?>
						</div>
					</div>`
				</div>
			</nav>

		<?php endif; ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'ThreeWebsite' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 

		$fields =  array(

		  'author' =>
		  	'<p><div class="input-group">'.
		    '<span class="input-group-addon author-comment">Name<span class="text-danger">*</span></span>'.
		    '<input class="form-control" id="author" name="author" type="text"/>'.
		    '</div></p>',

		  'email' =>
		  	'<p><div class="input-group">'.
		    '<span class="input-group-addon email-comment">Email<span class="text-danger">*</span></span>'.
		    '<input class="form-control" id="email" name="email" type="text"/>'.
		    '</div></p>',

		  'url' =>
		    '<p><div class="input-group">'.
		    '<span class="input-group-addon email-comment">Website</span>'.
		    '<input class="form-control" id="url" name="url" type="text"/></p>'.
		    '</div></p>',
		);

		$args = array(
		  'id_form'           => 'commentform',
		  'class_form'		  => 'comment-form',
		  'id_submit'         => 'submit',
		  'class_submit'      => 'submit',
		  'name_submit'       => 'submit',
		  'title_reply'       => __( 'Leave a Comment' ),
		  'title_reply_to'    => __( 'Leave a Reply to %s' ),
		  'cancel_reply_link' => __( 'Cancel Reply' ),
		  'label_submit'      => __( 'Send' ),
		  'format'            => 'xhtml',

		  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment:', 'noun' ) .
		    '</label><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
		    '</textarea></p>',

		  'must_log_in' => '<p class="must-log-in">' .
		    sprintf(
		      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		    ) . '</p>',

		  'logged_in_as' => '<p class="logged-in-as">' .
		    sprintf(
		    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
		      admin_url( 'profile.php' ),
		      $user_identity,
		      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
		    ) . '</p>',

		  'comment_notes_before' => '<p class="comment-notes">' .
		    __( 'Your email address will not be published.<br>Required fields are marked <span class="text-danger">*</span>' ) . ( $req ? $required_text : '' ) .
		    '</p>',


		  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		);
	 ?>
	 <div class="col-sm-5">
	 	<?php comment_form($args); ?>
	 </div>
	
</div><!-- .comments-area -->
