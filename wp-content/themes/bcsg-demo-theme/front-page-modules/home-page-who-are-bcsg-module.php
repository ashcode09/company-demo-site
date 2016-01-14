<div id="bcsg" class="bcsg">
  <div class="container">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <h2 class="text-uppercase">
        <?php query_posts('&tag="whoarebcsgmodule"&cat='.$catid); while (have_posts()) : the_post(); the_title(); ?>
        <div class="heading-underline"></div>
      </h2>
      <div class="content"><?php the_content(); endwhile; wp_reset_query();?></div>
      <a class="btn btn-on-darkbg" href="http://www.bcsg.com/"><?php query_posts('&tag="linktoproductpage"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?></a>
    </div>
  </div>
</div>