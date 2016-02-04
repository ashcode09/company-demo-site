<?php $allproductsid = get_cat_ID( "All Products" ); ?>
<div id="howDoesItWork" class="how-does-it-work">
  <div class="container">
    <div class="row">
      <h2 class="text-uppercase">
        <?php query_posts('&tag="howdoesitworktitle"&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
        <div class="heading-underline"></div>
      </h2>
      <?php query_posts('&tag="howdoesitworkmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
      <div><?php the_content_part(1); ?></div>
    </div>
    <div class="steps row">
      <!--
      As there are 3 steps being detailed in this section of the product pages, we're looping through the post with tag 'howdoesitworkmodule' for each of the parts (which are seen on the post in /wp-admin),
      and repeating this structure for each of the steps. Each step has three parts to it (an image, a heading and a paragraph), hence why we're going up by 3 in each loop.
      If that changes, so should this!
      -->
      <?php $z=2; for ($x = 1; $x <= 3; $x++) { ?>
      <div class="col-md-4">
        <?php the_content_part($z); ?>
        <h3 class="heading"><?php the_content_part($z+1); ?></h3>
        <div class="content"><?php the_content_part($z+2); ?></div>
      </div>
      <?php $z+=3; } // for ($x = 1; $x <= 3; $x++) ?>
      <?php endwhile; wp_reset_query();?>
    </div>
    <a class="btn btn-on-lightbg" href="http://mtdev.mybusinessworks.co.uk/Vanila/">
      <?php if ($catid === get_cat_ID( "Product Plan HQ" )) { 
        query_posts('&tag=subscribebtn&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); 
      } else { 
        query_posts('&tag=subscribebtn&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();
      } ?>
    </a>
  </div>
</div>