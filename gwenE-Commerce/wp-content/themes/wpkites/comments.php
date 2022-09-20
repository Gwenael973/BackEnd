<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpkites
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
if (have_comments()) : ?>
    <article class="comment-section">
        <div class="comment-title">
            <h3>
                <?php
                $wpkites_comment_count = get_comments_number();
                if ('1' === $wpkites_comment_count) {
                    printf(
                            /* translators: 1: title. */
                            esc_html__('1 comment', 'wpkites' ),
                            '<span>' . esc_html(get_the_title()) . '</span>'
                    );
                } else {
                    printf(
                            /* translators: 1: comment count number, 2: title. */
                            esc_html(_nx('%1$s comment', '%1$s comments', $wpkites_comment_count, 'comments title', 'wpkites' )),
                            esc_html(number_format_i18n($wpkites_comment_count)),
                            '<span>' . esc_html(get_the_title()) . '</span>'
                    );
                }
                ?>
            </h3>
        </div>
        <?php
        the_comments_navigation();
        wp_list_comments('type=comment&callback=wpkites_comment');
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'wpkites' ); ?></p>
        <?php endif; ?>
    </article>
<?php endif;
echo '<article class="comment-form">';
  
     $wpkites_fields=array(
        'author' => '<p><span class="blog-form-group your-name">
                    <input type="text" name="author" value="" size="40" class="blog-form-control" placeholder="'.__('Your Name','wpkites' ).'" aria-required="true" arai-invalid="false">
                   </span></p>',
        'email' => '<p><span class="blog-form-group your-email">
                     <input type="email" name="email" value="" size="40" class="blog-form-control" placeholder="'.__('Your Email','wpkites' ).'" aria-required="true" arai-invalid="false">
                   </span></p>',
       'url' => '<p>
                 <span class="blog-form-group your-subject">
                   <input type="text" name="url" value="" size="40" class="blog-form-control" placeholder="'.__('Website','wpkites' ).'" aria-required="true" arai-invalid="false">
                   </span>
                </p>',
        

        );
        function wpkites_fields($wpkites_fields) { 
            return $wpkites_fields;
        }
        add_filter('comment_form_default_fields','wpkites_fields');
            $wpkites_defaults = array(
            'fields'=> apply_filters( 'comment_form_default_fields', $wpkites_fields ),
            'comment_field'=> '<p><span class="blog-form-group-textarea your-message">
                   <textarea id="comments" type="text" rows="4" name="comment" value="" size="40" class="blog-form-control" placeholder="'.esc_html__('Message','wpkites' ).'" aria-required="true" arai-invalid="false"></textarea>
                 </span></p>',     
            'logged_in_as' => '<p class="blog-post-info-detail">' . esc_html__("Logged in as",'wpkites'  ).' '.'<a href="'. esc_url(admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. esc_url(wp_logout_url( get_permalink() )).'" title="'.esc_html__('Log out from this Account','wpkites' ).'">'.' '.esc_html__("Log out",'wpkites' ).'?</a>' . '</p>',
            'id_submit'=> 'blogdetail-btn',
            'label_submit'=>esc_html__('Send Message','wpkites' ),
            'comment_notes_after'=> '',
            'comment_notes_before' => '',
            'title_reply'=> '<div class="comment-title">'.esc_html__('Leave a Reply', 'wpkites' ).'</div>',
            'id_form'=> 'commentform'
            );
            ob_start();
            comment_form($wpkites_defaults);
        
    
echo '</article>';?>