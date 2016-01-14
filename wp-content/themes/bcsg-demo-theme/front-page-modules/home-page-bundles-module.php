<div id="bundles" class="bundles">
  <div class="container">
    <h2 class="text-uppercase">
      <?php query_posts('&tag="bundlesmainheading"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
      <div class="heading-underline"></div>
    </h2>
    <h3><span class="reg-font-weight"><?php query_posts('&tag="bundlessmallheading"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?></h3>
    <div class="content"><?php query_posts('&tag="bundlesmaincontent"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?></div>
    <a href="http://mtdev.mybusinessworks.co.uk/Vanila/ssprovision.do?r1=ytovoFVX3zfruB0XO6iR09Oiuzo=" class="btn btn-on-lightbg">
      Sign up now
    </a>
  </div>
</div>