<div id="bcsg" class="bcsg">
  <div class="container">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <?php query_posts('&tag="whoarebcsgmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
      <h2 class="text-uppercase">
        <?php the_content_part(1); ?>
        <div class="heading-underline"></div>
      </h2>
      <div class="content"><?php the_content_part(2); ?></div>
      <?php endwhile; wp_reset_query(); ?>
      <a class="btn btn-on-darkbg" href="http://www.bcsg.com/"><?php query_posts('&tag="linktoproductpage"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?></a>
    </div>
  </div>
</div>