<?php get_header(); ?>
	
<div class="home-screen" style="margin-top: -3em;">
  <img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/hm.jpg' ?>">
  <div class="home-main">
    <h1>Bandung Smart City</h1>
		<div id="search_form">
			<?php get_search_form(); ?>
		</div>
  </div>
</div>



<div class="smart-container">
  <div class="smart-content col-md-12" id="b">
  
  <div class="row">
  <div class="col-md-2">
    <div class="smart-wrap thumbnail">
      <img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/1environment.png' ?>" alt="">
    </div>
  </div>

  <div class="col-md-2">
    <div class="smart-wrap thumbnail">
        <img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/2society.png' ?>" alt="">
    </div>
  </div>

  <div class="col-md-2">
    <div class="smart-wrap thumbnail">
        <img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/3living.png' ?>" alt="">
    </div>
  </div>
    <div class="col-md-6 text">
      <h3>Definisi Kota Cerdas</h3>
    Smart City adalah definisi kota cerdas, yaitu cerdas sistem manajemennya, cerdas warganya dan juga cerdas pemerintah kotanya. Konsep Smart City Bandung dibuat berdasarkan 6 hal yaitu : Smart Environment, Smart Society, Smart Living, Smart Economy, Smart Branding, Smart Governance.
    </div>
  </div>
  </div>


  <div class="smart-content col-md-12" id="b">

  <div class="row">
  <div class="col-md-2">
    <div class="smart-wrap thumbnail">
        <img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/4economy.png' ?>" alt="">
    </div>
  </div>

  <div class="col-md-2">
    <div class="smart-wrap thumbnail">        
      <img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/5branding.png' ?>" alt="">
    </div>
  </div>

  <div class="col-md-2">
    <div class="smart-wrap thumbnail">        
      <img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/6governance.png' ?>" alt="">
    </div>
  </div>


    <div class="col-md-6 text">
    Smart City juga kota yang dapat mengelola berbagai sumber dayanya secara efektif dan efisien untuk menyelesaikan berbagai tantangan kota menggunakan solusi inovatif, terintegrasi dan berkelanjutan untuk menyediakan  infrastruktur dan memberikan layanan kota yang dapat meningkatkan kualitas hidup warganya.
    </div>
    </div>

  </div>
</div>

<!-- <?php 
	$custom_post = new WP_Query('post=54');

	if ($custom_post -> have_posts()) :
		while ($custom_post -> have_posts()) : $custom_post->the_post(); ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php
	endwhile;
	else:
		echo "Tidak ada post";
	endif;
?> -->

<div class="some-space">
  <div class="content">
    <a href="<?php echo home_url() . '/blog'; ?>" class="btn btn-default">LIHAT SEMUA BERITA</a>
  </div>
</div>

<div class="news-container col-md-12">
  <div class="news-title">Berita Terbaru</div>
<?php

$args = array( 

'category__not_in' => 15 ,

'posts_per_page' => 3

);

$the_query = new WP_Query( $args );


if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
        $the_query->the_post(); ?>
          <div class="col-md-4">
            <div class="news-wrap thumbnail">
              <img src="<?php $img=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); echo $img[0]; ?>">
              <div class="caption">
                <h3><?php the_title(); ?></h3>
                <p><?php echo get_the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-default">SELENGKAPNYA</a>
              </div>
            </div>
          </div> 
  <?php 
        }
            echo '</ul>';
    } else {

    }

    wp_reset_postdata();
  ?>
</div>

<div class="some-space2">
  <div class="content">
    <a href="<?php echo home_url() . '/kontak'; ?>" class="btn btn-default">CARI TAHU TENTANG KAMI</a>
  </div>
</div>

<?php if (query_posts("cat=15" . "&showposts=1")) : ?>
<?php while (have_posts()) : the_post(); ?>

  <div class="event-container col-md-12">
  <div class="col-md-8">
    <div class="event-wrap event-big">
      <img src="<?php $img=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); echo $img[0]; ?>">
      <div class="caption">
        <h3>Acara Terhangat</h3>
        <p><?php the_title(); ?></p>
          <a href="<?php the_permalink() ?>" class="btn btn-default">SELENGKAPNYA</a>
      </div>
    </div>
  </div>

  <?php endwhile; ?>
  <?php else : ?>
  <?php /* Error 404 */ ?>
  <?php $filename = TEMPLATEPATH . '/404.php'; if (file_exists($filename)) { include($filename); } ?>
  <?php endif; ?>

  <?php if (query_posts("cat=15" . "&showposts=2" . "&offset=1")) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <div class="col-md-4">
      <div class="event-wrap event-small">
        <img src="<?php $img=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); echo $img[0]; ?>" alt="...">
        <div class="caption">
          <h3>Acara</h3>
          <p><?php the_title() ;?></p>
          <a href="<?php the_permalink() ?>" class="btn btn-default">SELENGKAPNYA</a>
          </div>
      </div>
    </div>

  <?php endwhile; ?>
  <?php else : ?>
  <?php /* Error 404 */ ?>
  <?php $filename = TEMPLATEPATH . '/404.php'; if (file_exists($filename)) { include($filename); } ?>
  <?php endif; ?>
      
  <!-- <div class="col-md-4" style="float: right; margin-top: 60px;">
    <div class="event-wrap event-small">
      <img src=/Diskominfo5/asset/images/download.png alt="...">
      <div class="caption">
        <h3>Acara</h3>
        <p>Lorem ipsum dolor sit amet, elidendi consectetur adipisicing elit. In rerum dolores.</p>
        <a href="#" class="btn btn-default">SELENGKAPNYA</a>
        </div>
    </div>
  </div> -->

</div>    
</div>
<?php get_footer(); ?>