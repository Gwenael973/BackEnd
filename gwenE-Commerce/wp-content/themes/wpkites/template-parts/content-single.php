<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>	
	<?php
	if(has_post_thumbnail()):?>
	<figure class="post-thumbnail">
		<?php the_post_thumbnail('full',array('class'=>'img-fluid','alt'=>'blog-image'));?>			
	</figure>	
	<?php endif;?>

    <div class="post-content <?php if(!has_post_thumbnail()){ echo 'remove-images';}?>">
    <?php if(get_theme_mod('wpkites_enable_single_post_date',true) || get_theme_mod('wpkites_enable_single_post_admin',true) || get_theme_mod('wpkites_enable_single_post_category',true) || get_theme_mod('wpkites_enable_single_post_comnt',true)): ?>
		<?php
		if(get_theme_mod('wpkites_enable_single_post_date',true)==true):?>
			<div class="entry-date <?php if(!has_post_thumbnail()){ echo 'remove-image';}?>">
	            <a href="<?php echo esc_url(home_url('/')).esc_html(date('Y/m', strtotime(get_the_date()))); ?>">
	                <?php echo esc_html(get_the_date()); ?>
	            </a>
		    </div>
		<?php endif;
    	if(get_theme_mod('wpkites_enable_single_post_admin',true) || get_theme_mod('wpkites_enable_single_post_category',true) || get_theme_mod('wpkites_enable_single_post_comnt',true)): ?>
			<div class="entry-meta">

				<?php
				if(get_theme_mod('wpkites_enable_single_post_admin',true)==true):?>
					<i class="fa fa-user"></i>
					<span class="author postauthor">
						<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
		                <?php echo esc_html(get_the_author()); ?></a>
		            </span>
				<?php endif;


				if(get_theme_mod('wpkites_enable_single_post_category',true)==true):
					$wpkites_cat_list = get_the_category_list();
		            if (!empty($wpkites_cat_list)) {?>
		                <i class="fa fa-folder-open"></i>
                        <span class="cat-links postcat">
                        	<?php the_category(', '); ?>	                                		
                        </span>
		            <?php }
	             endif;

				if (get_theme_mod('wpkites_enable_single_post_comnt', true) == true):
					$wpkites_commt = get_comments_number();
	                if (!empty($wpkites_commt)) {
	                    ?>
	                    <i class="fa fa-comment-o"></i>
                        <span class="cat-links">
                        	<a href="<?php the_permalink();?>"><?php echo esc_html(get_comments_number());?></a>
                    	</span>
	                <?php }
	            endif;?>	

			</div>

    	<?php endif;?>
	
    <?php endif;?>

	<header class="entry-header blog-title">
            <h4 class="entry-title blog-title"><?php the_title();?></h4>
	</header>

	<div class="entry-content">
		<?php the_content();?>
		<?php wp_link_pages( ); ?>
	</div>
</div>
</article>