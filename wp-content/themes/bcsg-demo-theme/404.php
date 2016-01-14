<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


	<div id="primary" class="content-area container">
		<div id="content" class="site-content" role="main">

			
			<h1 style="margin-top: 80px; margin-bottom: 50px;"><?php _e( 'The page you were looking for could not be found', 'twentyfourteen' ); ?></h1>
			

			<div class="page-content" style="font-size: 22px;">
				<p>This is a 404 page. You are here because the page you have requested does not exist or can be found at another location.</p>
				<p>You might want to visit one of these pages:</p>

				<p><a href="http://www.mybusinesstoolkit.ie/" style="color: #333; text-decoration: underline;">Homepage</a><br /><a href="http://www.mybusinesstoolkit.ie/help/help/" style="color: #333; text-decoration: underline;">Help</a></p>

				<p>Alternatively our friendly customer support team might be able to help by phone 1890 944 532 or directly via webchat.</p>

        <?php

        ?>

			</div><!-- .page-content -->

		</div><!-- #content -->
	</div><!-- #primary -->

    <footer style="bottom: 0; position: absolute; width: 100%;">
      <nav class="navbar navbar-default footer" role="navigation">
        <div class="container">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
              <ul class="nav navbar-nav popover-examples">
                <li><a href="http://www.mybusinesstoolkit.ie/help/terms/">Terms of use</a></li>
                <li><a href="http://www.mybusinesstoolkit.ie/help/privacy/">Privacy policy</a></li>
              </ul>
          </div><!-- /.container-fluid -->
          <p>Have a question or need help getting started? Don't forget that our friendly customer support team is here to provide you with instant answers to your questions by phone on: 1890 944 532 or directly via webchat. Lines are open from 8:00am to 6:00pm, Monday to Friday local time. You can also email us at <a href="mailto:support@mybusinesstoolkit.ie">support@mybusinesstoolkit.ie</a></p>
          <p>MyBusinessToolkit is brought to you by BCSG (Ireland) Limited. "AIB" and the AIB logo are the registered trademarks of Allied Irish Banks, p.l.c. and are used under licence by BCSG (Ireland) Limited, trading as MyBusinessToolkit.</p>
        </div>
      </nav>
    </footer>

    <?php wp_footer(); ?>

  </body>
</html>