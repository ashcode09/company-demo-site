<?php query_posts('&tag="toolkitmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
<div id="toolkit" class="intro-toolkit">
  <div id="toolkitBgImage" class="toolkit-bg-image bg-img-parallax" style="background-image: url(<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/wp-content/themes/bcsg-demo-theme/img/blue-jagged-bg.jpg' ?>)">
    <div class="container">
      <h2 class="text-uppercase">
        <?php the_content_part(1); endwhile; wp_reset_query(); ?>
        <div class="heading-underline"></div>
      </h2>
      <div class="intro-copy"><?php query_posts('&tag="toolkitmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) the_content_part(2); ?></div>
      <div class="row">
        <div class="col-sm-6 col-md-3" onmouseover="showHoverBox(this)" onmouseleave="hideHoverBox(this)">
          <div class="front-boxes" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/planhq-1.jpg)">
            <div class="tool-logos"><img class="image" src="<?php bloginfo('template_directory'); ?>/img/planhq-logo-1.png"></a></div>
          </div>

        <?php endwhile; wp_reset_query(); ?>
          <div class="hover-boxes" style="background-image: linear-gradient(rgba(34, 44, 52, 0.8), rgba(34, 44, 52, 0.8)), url(<?php bloginfo('template_directory'); ?>/img/planhq-1.jpg)">
            <?php query_posts('&tag="toolkitmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
              <h4 class="headings"><?php the_content_part(3); ?></h4>
              <div class="content"><?php the_content_part(4); ?></div>
              <div class="deal text-uppercase"><?php the_content_part(5); ?></div>
            <?php endwhile; wp_reset_query(); ?>
            <!-- KEEP THIS -->
            <a href="/index.php/plan-hq/" class="link"><?php query_posts('&tag="linktoproductpage"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?></a>
          </div>
        </div>



        <div class="col-sm-6 col-md-3" onmouseover="showHoverBox(this)" onmouseleave="hideHoverBox(this)">
          <div class="front-boxes" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/receipt-bank.jpg)">
            <div class="tool-logos"><img class="image" src="<?php bloginfo('template_directory'); ?>/img/receipt-bank-logo-1.png"></a></div>
          </div>
          <div class="hover-boxes" style="background-image: linear-gradient(rgba(34, 44, 52, 0.8), rgba(34, 44, 52, 0.8)), url(<?php bloginfo('template_directory'); ?>/img/receipt-bank.jpg)">
            <?php query_posts('&tag="toolkitmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
              <h4 class="headings"><?php the_content_part(6); ?></h4>
              <div class="content"><?php the_content_part(7); ?></div>
              <div class="deal text-uppercase"><?php the_content_part(8); ?></div>
            <?php endwhile; wp_reset_query(); ?>
            <!-- KEEP THIS -->
            <a href="/index.php/receipt-bank/" class="link"><?php query_posts('&tag="linktoproductpage"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?></a>
          </div>
        </div>



        <div class="col-sm-6 col-md-3" onmouseover="showHoverBox(this)" onmouseleave="hideHoverBox(this)">
          <div class="front-boxes" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/sage.jpg)">
            <div class="tool-logos"><img class="image" src="<?php bloginfo('template_directory'); ?>/img/sage-logo-1.png"></a></div>
          </div>
          <div class="hover-boxes" style="background-image: linear-gradient(rgba(34, 44, 52, 0.8), rgba(34, 44, 52, 0.8)), url(<?php bloginfo('template_directory'); ?>/img/sage.jpg)">
            <?php query_posts('&tag="toolkitmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
              <h4 class="headings"><?php the_content_part(9); ?></h4>
              <div class="content"><?php the_content_part(10); ?></div>
              <div class="deal text-uppercase"><?php the_content_part(11); ?></div>
            <?php endwhile; wp_reset_query(); ?>
            <!-- KEEP THIS -->
            <a href="/index.php/sage/" class="link"><?php query_posts('&tag="linktoproductpage"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?></a>
          </div>
        </div>



        <div class="col-sm-6 col-md-3" onmouseover="showHoverBox(this)" onmouseleave="hideHoverBox(this)">
          <div class="front-boxes" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/be-online.jpg)">
            <div class="tool-logos"><img class="image" src="<?php bloginfo('template_directory'); ?>/img/bonline-logo-1.png"></a></div>
          </div>
          <div class="hover-boxes" style="background-image: linear-gradient(rgba(34, 44, 52, 0.8), rgba(34, 44, 52, 0.8)), url(<?php bloginfo('template_directory'); ?>/img/be-online.jpg)">
            <?php query_posts('&tag="toolkitmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
              <h4 class="headings"><?php the_content_part(12); ?></h4>
              <div class="content"><?php the_content_part(13); ?></div>
              <div class="deal text-uppercase"><?php the_content_part(14); ?></div>
            <?php endwhile; wp_reset_query(); ?>
            <!-- KEEP THIS -->
            <a href="/index.php/bonline/" class="link"><?php query_posts('&tag="linktoproductpage"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?></a>
          </div>
        </div>




      </div>
    </div>
  </div>
</div>