<article  id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>	
	<?php
	if(has_post_thumbnail()):?>
	<figure class="post-thumbnail">
		<?php the_post_thumbnail('full',array('class'=>'img-fluid','alt'=>'blog-image'));?>			
	</figure>	
	<?php endif;?>	
	<div class="post-content <?php if(!has_post_thumbnail()){ echo 'remove-images';}?>">	

			<div class="entry-date <?php if(!has_post_thumbnail()){ echo 'remove-image';}?>">
	            <a href="<?php echo esc_url(home_url('/')).esc_html(date('Y/m', strtotime(get_the_date()))); ?>">
	                <?php echo esc_html(get_the_date()); ?>
	            </a>
	        </div>

		<div class="entry-meta"> 
			
			<i class="fa fa-user"></i>
							<span class="author postauthor">
								<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
				                <?php echo esc_html(get_the_author()); ?></a>
				            </span>				            
						<?php 
					$wpkites_cat_list = get_the_category_list();
                            if (!empty($wpkites_cat_list)) {?>
                                <i class="fa fa-folder-open"></i>
                                <span class="cat-links postcat">
                                	<?php the_category(', '); ?>	                                		
                                </span>
                            <?php }
						
					$wpkites_commt = get_comments_number();
		                    if (!empty($wpkites_commt)) {
		                        ?>
		                        <i class="fa fa-comment-o"></i>
		                        <span class="cat-links">
		                        	<a href="<?php the_permalink();?>"><?php echo esc_html(get_comments_number());?></a>
		                    	</span>
		                    <?php }
			           ?> 
		</div>
			
		<header class="entry-header">
			<h4 class="entry-title">
				<a class="rm-h4" href="<?php the_permalink();?>"><?php the_title();?></a>
			</h4> 
		</header>
		<div class="entry-content">
		<?php wpkites_posted_content();?>
		 <?php
		 $wpkites_button_show_hide=get_theme_mod('wpkites_blog_content','excerpt');
		 if($wpkites_button_show_hide=="excerpt")
		 {
		 if(get_theme_mod('wpkites_enable_blog_read_button',true)==true):
		 wpkites_button_title();
		 endif;
		} ?>
	</div>
	</div>
</article>