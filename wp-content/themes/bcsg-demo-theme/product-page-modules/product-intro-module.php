<?php $allproductsid = get_cat_ID( "All Products" ); ?>
<div id="productIntro" class="product-intro bg-img-parallax" style="background: url(<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/wp-content/themes/bcsg-demo-theme/img/blue-jagged-bg.jpg' ?>); background-position: center;">
  <div class="product-intro-1" style="background: url(<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/wp-content/themes/bcsg-demo-theme/img/'.$img_name_for_product_intro ?>); background-position: center; background-size: cover;">
    <div class="container">
      <div class="row">
        <?php query_posts('&tag=productintroheadings&cat='.$catid); while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <h4><?php the_content(); ?></h4>
        <?php endwhile; wp_reset_query();?>
      </div>
    </div>
    <div>
      <div class="buttons">
        <a class="btn btn-on-darkbg" onclick="goHere('howDoesItWork')">
          <?php query_posts('&tag=scrolltohowitworks&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>
        </a>
        <a class="btn btn-on-lightbg" href="http://mtdev.mybusinessworks.co.uk/Vanila/">
          <?php if ($catid === get_cat_ID( "Product Plan HQ" )) { 
            query_posts('&tag=subscribebtn&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); 
          } else { 
            query_posts('&tag=subscribebtn&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();
          } ?>
        </a>
      </div>
    </div>
  </div>
  <div class="product-intro-2 container">
    <div class="row">
    <div class="left-content col-lg-6">
      <?php query_posts('&tag=productintropart2&cat='.$catid); while (have_posts()) : the_post(); ?>
      <h2 class="text-uppercase heading"><?php the_title(); ?><div class="heading-underline"></div></h2>
      <?php the_content(); endwhile; wp_reset_query();?>
    </div>
    <?php query_posts('&tag=intromodulelaptopimg&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>
  </div>
</div>