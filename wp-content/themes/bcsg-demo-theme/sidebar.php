<?php
//Get the current Post ID
$post_id = get_the_ID();
?>
<div class="accordion clearfix mobile-margin-top" id="side-nav-accordion">
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
      if ($posts) { ?>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#side-nav-accordion" href="#collapse<?php echo $category->term_id; ?>">
              <?php echo $category->name; ?>
            </a>
          </div>
          <div id="collapse<?php echo $category->term_id; ?>" class="accordion-body collapse">
            <div class="accordion-inner">
              <ul>
        <!--echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a><ul> '; -->
      <?php
        foreach($posts as $post) {
          setup_postdata($post); ?>
                <li <?php if($post_id == get_the_ID()){ ?>class="active"<?php } ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
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