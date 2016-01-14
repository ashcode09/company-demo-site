<?php
  //Get the current Post ID
  $post_id = get_the_ID();
  $post_categories = wp_get_post_categories( $post_id );
  $current_post_cat = $post_categories[0];
?>

<div class="help-sidebar">
  <div class="accordion clearfix mobile-margin-top" id="sideNavAccordion">
    <?php
      //for each category, show all posts
      $cat_args=array(
        'orderby' => 'name',
        'order' => 'ASC'
      );
      $categories=get_categories($cat_args);
      foreach($categories as $category) {
        $args=array(
          'showposts' => -1,
          'category__in' => array($category->term_id),
          'caller_get_posts'=>1,
          'orderby' => 'post_date',
          'order' => 'ASC'
        );
        $posts=get_posts($args);
        // For every category except the "Front Page Content" one (where $category->term_id is 9), we're showing each category name and each of their post titles
        if ($posts && $category->term_id != 9) { ?>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a id="click<?php echo $category->term_id; ?>" class="accordion-toggle help-links help-headings" onclick="openCategory(this, 500)" data-toggle="collapse" data-parent="#sideNavAccordion">
                <?php echo $category->name; ?>
              </a>
            </div>
            <div id="collapse<?php echo $category->term_id; ?>" class="accordion-body">
              <div class="accordion-inner">
                <ul>
                  <?php
                    foreach($posts as $post) {
                      setup_postdata($post); ?>
                      <li <?php if($post_id == get_the_ID()){ ?>class="active"<?php }; ?>><a class="help-links small-body-copy" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
                      <?php
                    } // foreach($posts
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <?php
        } // if ($posts
      } // foreach($categories
    ?>
  </div>
</div>

<script type="text/javascript">
// When the page loads, we're opening the category of the current question we're looking at (but with a 0 animation length). These are the variables we're feeding into our js file:
  var idOfCurrentCat = "<?php echo $current_post_cat ?>";
  var btnForCurrentCategory = document.getElementById('click' + idOfCurrentCat);
</script>