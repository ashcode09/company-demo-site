<div id="keyFeatures" class="key-features">
  <div class="container">
    <div class="row">
    <!--
    As there are 6 key features for each product, and each of their post tags are the same except for the increasing number (i.e. keyfeature1, keyfeature2, etc...),
    we're just going to repeat each feature structure 6 times for each of the features.
    When x = 3, we start a new row (otherwise the feature boxes get confused and don't line up!).
    -->
    <?php for ($x = 1; $x <= 6; $x++) { ?>
      <div class="col-md-4">
        <?php query_posts('&tag="keyfeatureimg'.$x.'"&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
        <?php query_posts('&tag=keyfeature'.$x.'&cat='.$catid); while (have_posts()) : the_post(); ?>
        <h3 class="heading"><?php the_title(); ?></h3>
        <div class="content"><?php the_content(); endwhile; wp_reset_query(); ?></div>
      </div>
      <?php if ($x === 3) { ?>
    </div>
    <div class="row">
      <?php } // if ($x === 3)
    } // for ($x = 1; $x <= 6; $x++) ?>
    </div>
  </div>
</div>