<?php 
$allpagesid = get_cat_ID( "All Pages" ); 
$contactdetailsid = get_cat_ID( "Contact Details" ); ?>
<?php switch_to_blog(1); ?>
<?php query_posts('&tag="footermodule"&cat='.$allpagesid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>

    <div id="footer" class="footer small-body-copy">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-3 copyright">
            <?php the_content_part(1); ?>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-4">
            <a href="#" class="t-and-cs links-on-darkbg"><?php the_content_part(2); ?></a> |
            <a href="#" class="privacy-policy links-on-darkbg"><?php the_content_part(3); ?></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10 content">
            <div class="content-paragraph"><?php the_content_part(4); endwhile; wp_reset_query(); ?>
              <a class="links-on-darkbg" href="mailto:<?php query_posts('&tag="contactemail"&cat='.$contactdetailsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>">
                <?php query_posts('&tag="contactemail"&cat='.$contactdetailsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
              </a> <?php query_posts('&tag="footermodule"&cat='.$allpagesid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) the_content_part(5); endwhile; wp_reset_query();?>
              <a class="links-on-darkbg" href="tel:<?php query_posts('&tag="contactphonenumber"&cat='.$contactdetailsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>"> 
                <?php query_posts('&tag="contactphonenumber"&cat='.$contactdetailsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?> 
              </a>*
            </div>
            <div class="content-paragraph"><?php query_posts('&tag="footermodule"&cat='.$allpagesid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) the_content_part(6); endwhile; wp_reset_query();?></div>
          </div>
        </div>
      </div>
    </div>
<?php restore_current_blog(); ?>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/js/jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/js/hammerjs/hammer.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/js/main.min.js"></script>
  </body>
</html>

  