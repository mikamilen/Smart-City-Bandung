<?php get_header(); ?>
	
	<main>
		
	<?php 
	if (have_posts()) :
		while (have_posts()) : the_post();

			get_template_part( 'content');

		endwhile;
	else:
		echo "tidak ada post";
	endif;
 	?>
	</main>

        <div class="blog-side col-lg-4">
            <?php dynamic_sidebar( 'sidebar1' ); ?>
            <br>
			<?php dynamic_sidebar( 'sidebar2' ); ?>
           

        </div>

	<aside>
		
	</aside>

	<div class="clear"></div>

<?php get_footer(); ?>