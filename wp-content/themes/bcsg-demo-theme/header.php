<html>
  <head>
    <meta charset="utf-8"></meta>
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/css/bootstrap.min.css"></link>
    <link href="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/vanilla-clone.min.css" rel="stylesheet">
  </head>
  <body>
    <?php if ('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] == 'http://'.$_SERVER['HTTP_HOST'].'/') { ?>
    <div id="navbarHeader" class="navbar-fixed-top navbar-header small-body-copy">
    <?php } else { ?>
    <div id="navbarHeader" class="navbar-fixed-top navbar-header small-body-copy navbar-scrolled-down">
    <?php } ?>
      <div class="row">
        <div class="col-md-2 navbar-left">
          <a class="navbar-brand brand-img" href="/"><img id="brandImgDarkBg" class="showOnDarkBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/logo.png" /><img id="brandImgLightBg" class="showOnLightBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/logo-lightbg.png" style="display: none"/></a>
          <a onclick="navbarCollapseToggle('#navBarCollapse', 'opened')" class="menu-btn" id="menuBtn"><img class="showOnDarkBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/navbar-collapse-icon.png" /><img class="showOnLightBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/navbar-collapse-icon-grey.png" /></a>
        </div>
        <div class="nav-bar-collapse" id="navBarCollapse">
          <ul class="nav navbar-nav menu-nav col-md-9">
            <li><a href="/" class="nav-options" onclick="closeNavBarAndPullPageBack('#navBarCollapse', 'opened')">Home</a></li>
            <!-- Am basically looping through each 'page' that we have (which are all product pages) and creating a link that goes to that page as well as giving the link the page's title -->
            <?php switch_to_blog(1);
            $args = array( 'sort_order' => 'asc', 'sort_column'  => 'menu_order', 'hierarchical' => 1, 'exclude' => '', 'include' => '', 'meta_key' => '', 'meta_value' => '', 'authors' => '', 'child_of' => 0, 'parent' => -1, 'exclude_tree' => '', 'number' => '', 'offset' => 0, 'post_type' => 'page', 'post_status' => 'publish' ); 
            $pages = get_pages($args);
            if ($pages) {
              foreach ($pages as $page) { ?>
            <li><a href="<?php echo get_page_link($page->ID); ?>" class="nav-options"><?php $page = get_post($page->ID); echo $page->post_title; ?></a></li>
            <?php
              } // foreach ($pages as $page)
            } // if ($pages)
            restore_current_blog(); ?>
          </ul>
          <ul class="nav navbar-nav login-nav col-md-3">
            <li><a href="/help/" class="nav-options">Help</a></li>
            <li><a href="<?php query_posts('&tag=linktosignup&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>" class="nav-options">Sign up</a></li>
            <li><a href="<?php query_posts('&tag=linktologin&cat='.$allproductsid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>" class="nav-options last-in-nav">Log in</a></li>
          </ul>
        </div>
      </div>
    </div>