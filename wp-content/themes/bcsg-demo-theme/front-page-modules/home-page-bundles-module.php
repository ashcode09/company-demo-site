<div id="bundles" class="bundles">
  <div class="container">
    <?php query_posts('&tag="bundlesmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
    <h2 class="text-uppercase">
      <?php the_content_part(1); ?>
      <div class="heading-underline"></div>
    </h2>
    <h3><span class="reg-font-weight"><?php the_content_part(2); ?></h3>
    <div class="content"><?php the_content_part(3); ?></div>
    <?php endwhile; wp_reset_query();?>
    <a href="http://mtdev.mybusinessworks.co.uk/Vanila/ssprovision.do?r1=ytovoFVX3zfruB0XO6iR09Oiuzo=" class="btn btn-on-lightbg">
      Sign up now
    </a>
  </div>
</div>