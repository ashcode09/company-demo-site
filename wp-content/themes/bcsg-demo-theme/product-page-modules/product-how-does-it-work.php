<?php $allproductsid = get_cat_ID( "All Products" ); ?>
<div id="howDoesItWork" class="how-does-it-work">
  <div class="container">
    <div class="row">
      <h2 class="text-uppercase">
        <?php query_posts('&tag="howdoesitworktitle"&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
        <div class="heading-underline"></div>
      </h2>
      <?php query_posts('&tag="howdoesitworkintro"&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
    </div>
    <div class="steps row">
      <!--
      As there are 3 steps being detailed in this section of the product pages and each of their post tags (&tag=) are identical except for the increasing integer (i.e. howdoesitworkstep1, howdoesitworkstep2),
      we're just looping from 1 to 3 and repeating the structure of each feature in this div row.
      -->
      <?php for ($x = 1; $x <= 3; $x++) { ?>
      <div class="col-md-4">
        <?php query_posts('&tag="howdoesitworkimg'.$x.'"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
        <?php query_posts('&tag="howdoesitworkstep'.$x.'"&cat='.$catid); while (have_posts()) : the_post(); ?>
        <h3 class="heading"><?php the_title(); ?></h3>
        <div class="content"><?php the_content(); endwhile; wp_reset_query();?></div>
      </div>
      <?php } // for ($x = 1; $x <= 3; $x++) ?>
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