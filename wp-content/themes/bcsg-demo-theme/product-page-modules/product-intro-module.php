<?php $allproductsid = get_cat_ID( "All Products" ); ?>
<div id="productIntro" class="product-intro bg-img-parallax" style="background: url(<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/wp-content/themes/bcsg-demo-theme/img/blue-jagged-bg.jpg' ?>); background-position: center;">
  <div class="product-intro-1" style="background: url(<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/wp-content/themes/bcsg-demo-theme/img/'.$img_name_for_product_intro ?>); background-position: center; background-size: cover;">
    <div class="container">
      <div class="row">
        <?php query_posts('&tag="productintromodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
        <h1><?php the_content_part(1); ?></h1>
        <h4><?php the_content_part(2); ?></h4>
        <?php endwhile; wp_reset_query();?>
      </div>
    </div>
    <div>
      <div class="buttons">
        <a class="btn btn-on-darkbg" onclick="goHere('howDoesItWork')">
          <?php query_posts('&tag=scrolltohowitworks&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>
        </a>
        <a class="btn btn-on-lightbg" href="<?php query_posts('&tag=linktosignup&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>">
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
      <?php query_posts('&tag="productintromodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
      <h2 class="text-uppercase heading"><?php the_content_part(3); ?><div class="heading-underline"></div></h2>
      <?php the_content_part(4); ?>
      <h4 class="pricing"><?php the_content_part(5); ?></h4>
      <div class="small-body-copy deal"><?php the_content_part(6); ?></div>
    </div>
    <?php the_content_part(7); ?>
    <?php endwhile; wp_reset_query();?>   
  </div>
</div>