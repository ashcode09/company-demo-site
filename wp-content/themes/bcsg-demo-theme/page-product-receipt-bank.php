<?php
/*
Template Name: Product Receipt Bank
*/
?>

<?php
  $category = "Product Receipt Bank";
  $catid = get_cat_ID( $category );
  $img_name_for_product_intro = 'product-receipt-bank-bg-image.png';
  $img_name_for_intro_laptop = 'receipt-bank-laptop-stock-img.png';
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