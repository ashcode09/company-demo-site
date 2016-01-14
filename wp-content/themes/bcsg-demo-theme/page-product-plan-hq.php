<?php
/*
Template Name: Product Plan HQ
*/
?>

<?php
  $category = "Product Plan HQ";
  $catid = get_cat_ID( $category );
  $img_name_for_product_intro = 'product-plan-hq-bg-image.png';
  $img_name_for_intro_laptop = 'product-laptop-stock-img.png';
?>

  <!-- HEADER -->
  <?php get_header(); ?>
  <!-- PRODUCT PAGE LAYOUT -->
  <?php include(locate_template('product-page-layout.php')); ?>
  <!-- FOOTER -->
  <?php get_footer(); ?>

<script type="text/javascript">
  var home = false;
  var help = false;
</script>