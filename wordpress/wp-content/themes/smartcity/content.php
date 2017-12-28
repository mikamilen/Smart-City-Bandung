<?php if (is_single()): ?>
	<div class="blog-page">
	<div class="col-lg-8 blog-content-title"><?php the_title(); ?></div>
	<div class="col-lg-8">
            <div class="blog-content">
            <div class="blog-content-info">
                <h4>By <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>">
					<?php the_author(); ?></a> - <?php the_date('F j, Y'); ?>
				</h4>
            </div>
            <div class="blog-content-image">
				<?php the_post_thumbnail('big_thumb'); ?>
            </div>
            <div class="blog-content-subtitle">
            	<?php the_post_thumbnail_caption(); ?> 
            </div>        
			<p><?php the_content(); ?></p>
            <div class="blog-share">
            <p>Bagikan :</p>
            <!-- <?php echo DISPLAY_ULTIMATE_PLUS(); ?> -->
            </div>
        </div>
    </div>
     </div>
	
	 <?php else: ?>
<div class="listpost">
	<div class="col-sm-8">		
	</div>
	<div class="col-sm-4">
	</div>
	<div class="row">

           <div class="col-sm-4">
            <div class=""><?php the_post_thumbnail('medium'); ?></div>
           </div>
           <div class="col-sm-4	 listpost-info">
           	<h4><a class="listpost-title" href="<?php the_permalink(); ?>">	<?php the_title(); ?></a></h4>
           	<p class="time">
           		<?php
					echo the_category(', ');?>  - <?php the_time('g:i a');
				 ?></p>
           </div>

   </div>
</div>
<?php endif; ?>