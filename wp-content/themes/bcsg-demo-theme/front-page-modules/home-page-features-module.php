<div id="features" class="features">
  <div class="container">
    <div class="row">
    <!--
    As there are 4 features being detailed in this section of the home page, we're looping through the post with tag 'featuresmodule' for each of the parts (which are seen on the post in /wp-admin),
    and repeating this structure for each of the features. Each feature has three parts to it (an image, a heading and a paragraph), hence why we're going up by 3 in each loop.
    If that changes, so should this!
    -->
      <?php query_posts('&tag="featuresmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
      <?php $z=1; for ($x = 1; $x <= 4; $x++) { ?>
        <div class="col-md-3 feature-boxes">
          <?php the_content_part($z); ?>
          <h3 class="heading"><?php the_content_part($z+1); ?></h3>
          <?php the_content_part($z+2); ?>
        </div>
      <?php $z = $z + 3; } ?>
      <?php endwhile; wp_reset_query();?>
    </div>
  </div>
</div>