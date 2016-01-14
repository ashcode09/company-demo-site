<div id="intro" class="landing-page" style="background: url(<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/wp-content/themes/bcsg-demo-theme/img/'.$img_name_for_intro_bg ?>); background-position: center; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="main-heading">
        <h1 class="text-uppercase heading"><?php query_posts('&tag="intromodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) the_content_part(1); ?></h1>
        <h4><?php query_posts('&tag="intromodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) the_content_part(2); ?></h4>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-10 content">
        <?php query_posts('&tag="intromodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) the_content_part(3); endwhile; wp_reset_query();?>
      </div>
    </div>
  </div>
  <img id="scrollDownImg" onclick="goHere('toolkit', 400)" class="scroll-down-img" src="<?php bloginfo('template_directory');?>/img/scroll-icon.png" />
</div>