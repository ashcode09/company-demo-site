<div id="keyFeatures" class="key-features">
  <div class="container">
    <div class="row">
    <!--
    As there are 6 key features being detailed in this section of each product page, we're looping through the post with tag 'keyfeaturesmodule' for each of the parts (which are seen on the post in /wp-admin),
    and repeating this structure for each of the key features. Each feature has three parts to it (an image, a heading and a paragraph), hence why we're going up by 3 in each loop.
    If that changes, so should this!
    When x = 3, we start a new row (otherwise the feature boxes get confused and don't line up!).
    -->
    <?php $z=1; for ($x = 1; $x <= 6; $x++) { ?>
      <div class="col-md-4">
        <?php query_posts('&tag="keyfeaturesmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?>
        <?php the_content_part($z); ?>
        <h3 class="heading"><?php the_content_part($z+1); ?></h3>
        <div class="content"><?php the_content_part($z+2); ?></div>
        <?php $z+=3; endwhile; wp_reset_query();?>
      </div>
      <?php if ($x === 3) { ?>
    </div>
    <div class="row">
      <?php } // for ($x = 1; $x <= 3; $x++)
    } // for ($x = 1; $x <= 6; $x++) ?>
    </div>
  </div>
</div>