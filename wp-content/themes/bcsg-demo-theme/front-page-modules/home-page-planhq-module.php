<div id="planhq" class="planhq">
  <div class="left-content container">
    <div class="col-md-3"></div>
    <div class="col-md-8">
      <?php query_posts('&tag="homepageplanhqheadingandcontent"&cat='.$catid); while (have_posts()) : the_post(); ?>
      <h3 class="heading"><?php the_title(); ?></h3>
      <div class="content">
        <?php the_content(); endwhile; wp_reset_query();?>
      </div>
      <a href="/plan-hq/" class="links-on-lightbg"><?php query_posts('&tag="homepageplanhqtrynowlink"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?></a>
    </div>
  </div>
  <div class="image right-content" style="background-image: url('<?php bloginfo('template_directory');?>/img/planhq.jpg')"></div>
</div>