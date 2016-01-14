<?php
/*
Template Name: Cover Page
*/
?>

<?php
  $category = "Home Page";
  $catid = get_cat_ID( $category );
  $img_name_for_intro_bg = 'landing-page-stock-photo.jpg';
?>

<!-- HEADER -->
<?php get_header(); ?>
<!-- LANDING VIEW -->
<?php include(locate_template('front-page-modules/home-page-intro-module.php')); ?>
<!-- INTRODUCING THE TOOLKIT -->
<?php include(locate_template('front-page-modules/home-page-toolkit-module.php')); ?>
<!-- BUNDLES -->
<?php include(locate_template('front-page-modules/home-page-bundles-module.php')); ?>
<!-- VIDEO -->
<?php include(locate_template('front-page-modules/home-page-video-module.php')); ?>
<!-- FEATURES -->
<?php include(locate_template('front-page-modules/home-page-features-module.php')); ?>
<!-- PLANHQ -->
<?php include(locate_template('front-page-modules/home-page-planhq-module.php')); ?>
<!-- WHO ARE BCSG -->
<?php include(locate_template('front-page-modules/home-page-who-are-bcsg-module.php')); ?>
<!-- SIDE BAR -->
<?php include(locate_template('front-page-modules/home-page-sidebar-module.php')); ?>
<!-- FOOTER -->
<?php get_footer(); ?>

<script type="text/javascript">
  var home = true;
  var help = false;
</script>