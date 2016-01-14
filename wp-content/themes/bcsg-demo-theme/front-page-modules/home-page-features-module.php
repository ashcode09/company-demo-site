<div id="features" class="features">
  <div class="container">
    <div class="row">
    <!--
    As there are 4 features being detailed in this section of the home page and each of their post tags (&tag=) are identical except for the increasing integer (i.e. feature1img, feature2img),
    we're just looping from 1 to 4 and repeating the structure of each feature in this div row.
    -->
      <?php for ($x = 1; $x <= 4; $x++) { ?>
        <div class="col-md-3 feature-boxes">
          <?php query_posts('&tag="feature'.$x.'img"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>
          <?php query_posts('&tag="feature'.$x.'headingandcontent"&cat='.$catid); while (have_posts()) : the_post(); ?>
          <h3 class="heading"><?php the_title(); ?></h3>
          <?php the_content(); endwhile; wp_reset_query();?>
        </div>
      <?php } // for ($x = 1; $x <= 4; $x++) ?>
    </div>
  </div>
</div>