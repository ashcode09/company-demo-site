<div class="wrapping-container">
	<?php include(locate_template('../bcsg-demo-theme/header.php')); ?>
	<?php
	if ( is_home() ) :
		//See if the user has set a post
		$displayed_post = get_theme_mod('displayed_post');

		//Make sure we're not on null or 'none'
		if( isset($displayed_post) && $displayed_post != 'none') :
			query_posts($displayed_post); // Show only this post on home
		endif;
	endif; ?>
	<div id="help" class="container help">
		<div class="row-fluid">
			<div id="answers" class="col-md-9 info-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h2><?php the_title(); ?>
						<div class="heading-underline"></div>
					</h2>
					<div>
						<?php the_content(); ?>
					</div>

				<?php endwhile; else: ?>

				  <p><?php _e('Sorry, there are no Q&As.'); ?></p>

				<?php endif; ?>
			</div>
			<div class="col-md-3 sidebar-container">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php include(locate_template('../bcsg-demo-theme/footer.php')); ?>
</div>

<script type="text/javascript">
	var help = true;
  var home = false;
</script>