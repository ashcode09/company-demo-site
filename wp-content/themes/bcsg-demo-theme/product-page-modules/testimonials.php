<?php
/*
Template Name: Testimonials
*/

$category = "Testimonials";
$catid = get_cat_ID( $category );

?>

<!-- TESTIMONIALS -->
  <div class="testimonials">
    <div class="container">
      <div class="row">
        <h2 class="text-uppercase">
          <?php query_posts('&tag="testimonialsheading"&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query();?>
          <div class="heading-underline"></div>
        </h2>
      </div>
      <div id="allQuotes" class="row all-quotes">
        <div class="col-md-2"></div>
<?php $categories=get_categories(); foreach($categories as $category) {
  if ($category->name == 'Testimonials') {
    $args=array('category_name' => $category->name, 'orderby' => 'post_date', 'order' => 'ASC'); $posts=get_posts($args);
    if ($posts) {
      foreach ($posts as $post) { ?>
        <div id="quote<?php echo get_the_ID(); ?>" class="col-md-8 quote-box">
          <img class="left-quote" src="<?php bloginfo('template_directory');?>/img/left-quote.png">
          <h3 class="quote"><i><?php the_post(); the_content(); ?></i></h3>
          <div class="person"><i><?php the_title(); ?></i></div>
          <img class="right-quote" src="<?php bloginfo('template_directory');?>/img/right-quote.png">
        </div>
        <?php
        } // foreach ($posts as $post
      } // if ($posts
    } // if ($category->name == 'Testimonials'
  } // foreach($categories as $category
?>
      </div>
      <div id="allQuoteButtons">
<?php $categories=get_categories(); foreach($categories as $category) {
  if ($category->name == 'Testimonials') {
    $args=array( 'category_name' => $category->name, 'orderby' => 'post_date', 'order' => 'ASC'); $posts=get_posts($args);
    if ($posts) {
      foreach ($posts as $post) {
        $post_id = get_the_ID(); ?>
        <div id="quoteBtn<?php echo get_the_ID(); ?>" class="buttons" onclick="switchTo('quote<?php echo get_the_ID(); ?>', this)"></div>
        <?php
        } // foreach ($posts as $post
      } // if ($posts
    } // if ($category->name == 'Testimonials'
  } // foreach($categories as $category
?>        
      </div>
    </div>
  </div>