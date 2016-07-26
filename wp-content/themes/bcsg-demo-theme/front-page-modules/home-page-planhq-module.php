<div id="planhq" class="planhq">
  <div class="left-content container">
    <div class="col-md-3"></div>
    <div class="col-md-8">
      <?php query_posts('&tag="planhqmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
      <h3 class="heading"><?php the_content_part(1); ?></h3>
      <div class="content">
        <?php the_content_part(2); ?>
      </div>
      <a href="/plan-hq/" class="links-on-lightbg"><?php the_content_part(3); ?></a>
      <?php endwhile; wp_reset_query();?>
    </div>
  </div>
  <div class="image right-content" style="background-image: url('<?php bloginfo('template_directory');?>/img/planhq.jpg')"></div>
</div>