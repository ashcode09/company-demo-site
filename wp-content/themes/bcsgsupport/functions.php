<?php 

function quickchic_widgets_init() {
register_sidebar(array(
'name' => __( 'Sidebar 1', 'quickchic' ),
'id' => 'sidebar-1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}
add_action( 'init', 'quickchic_widgets_init' );

function wpbootstrap_scripts_with_jquery()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
  wp_enqueue_script('jquery');

	// Register the script like this for a theme:
	wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'bootstrap-script' );

	// Enqueue the bcsgsupport script which relies on JQUERY and should be placed in the footer
	wp_enqueue_script( 'bcsgsupport_script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery');


/**
 * Allow the user to customize the theme
 **/
function bcsgsupport_customizer( $wp_customize ) {
	//SET UP SOME SECTIONS
	$wp_customize->get_section('title_tagline')->title = __( 'Site Title and Header Link' );
	$wp_customize->get_section('title_tagline')->priority = 1;

	$wp_customize->add_section( 'header_section' , array(
    'title'       => __( 'Logo/Favicons', 'bcsgsupport' ),
    'priority'    => 2,
    'description' => 'Customize the Support Centre header.',
	));

	$wp_customize->add_section( 'header_mobile' , array(
    'title'       => __( 'Mobile', 'bcsgsupport' ),
    'priority'    => 3,
    'description' => 'Customize the menu button shown on mobile devices.',
	));

	$wp_customize->get_section('colors')->title = __( 'Theme Colors' );
	$wp_customize->get_section('colors')->priority = 4;

	$wp_customize->get_section('static_front_page')->title = __( 'Support Centre Defaults' );
	$wp_customize->get_section('static_front_page')->priority = 5;
	$wp_customize->get_section('static_front_page')->description = __( 'Customize the support section of the site.' );


	/*
	=======================
	      SET COLORS
	======================= */
	
	//BACKGROUND COLORS
	$wp_customize->add_setting( 'body_background_color' , array(
    'default'     => '#ffffff',
    'transport'   => 'refresh',
	));
	//FONT COLORS
	$wp_customize->add_setting( 'body_text_color' , array(
    'default'     => '#808080',
    'transport'   => 'refresh',
	));
	//LINK/HEADER COLORS
	$wp_customize->add_setting( 'link_header_color' , array(
    'default'     => '#00a5cf',
    'transport'   => 'refresh',
	));
	//LINK HOVER COLOR
	$wp_customize->add_setting( 'link_hover_color' , array(
    'default'     => '#21c2eb',
    'transport'   => 'refresh',
	));
	//HEADER BACKGROUND
	$wp_customize->add_setting( 'header_background' , array(
    'default'     => '#00a5cf',
    'transport'   => 'refresh',
	));
	//HEADER TEXT COLOR
	$wp_customize->add_setting( 'header_text' , array(
    'default'     => '#ffffff',
    'transport'   => 'refresh',
	));
	//MOBILE MENU BUTTON BACKGROUND
	$wp_customize->add_setting( 'mobile_menu_button_background' , array(
	  'default'     => '#00a5cf',
	  'transport'   => 'refresh',
	));
	//MOBILE MENU BUTTON BACKGROUND - HOVER
	$wp_customize->add_setting( 'mobile_menu_button_background_hover' , array(
	  'default'     => '#21c2eb',
	  'transport'   => 'refresh',
	));
	//MOBILE MENU BUTTON BORDER
	$wp_customize->add_setting( 'mobile_menu_button_border' , array(
	  'default'     => '#ffffff',
	  'transport'   => 'refresh',
	));
	//MOBILE MENU BUTTON CONTENS COLOR
	$wp_customize->add_setting( 'mobile_menu_button_color' , array(
	  'default'     => '#ffffff',
	  'transport'   => 'refresh',
	));
	//GLOBAL BORDER COLORS
	$wp_customize->add_setting( 'global_border_color' , array(
	  'default'     => '#e5e5e5',
	  'transport'   => 'refresh',
	));
	//NAVIGATION TAB HOVER COLOR
	$wp_customize->add_setting( 'navigation_tab_hover_color' , array(
	  'default'     => '#dbf8ff',
	  'transport'   => 'refresh',
	));

	//ADD CONTROLS
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background_color', array(
		'label'        => __( '1.1. Body Background Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'body_background_color',
	  'priority' => '1',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_text_color', array(
		'label'        => __( '1.2. Body Text Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'body_text_color',
	  'priority' => '2',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_header_color', array(
		'label'        => __( '1.3. Body Link / Heading Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'link_header_color',
	  'priority' => '3',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
		'label'        => __( '1.3.1 Body Link Hover Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'link_hover_color',
	  'priority' => '4',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background', array(
		'label'        => __( '2.1. Header Background Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'header_background',
	  'priority' => '5',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text', array(
		'label'        => __( '2.2. Header Text Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'header_text',
	  'priority' => '6',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button_background', array(
		'label'        => __( '2.3.1 Header - Mobile Menu Button Background Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'mobile_menu_button_background',
	  'priority' => '7',
	)));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button_background_hover', array(
		'label'        => __( '2.3.1.1 Header - Mobile Menu Button Background Color - Hover', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'mobile_menu_button_background_hover',
	  'priority' => '8',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button_border', array(
		'label'        => __( '2.3.2 Header - Mobile Menu Button Border Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'mobile_menu_button_border',
	  'priority' => '9',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button_color', array(
		'label'        => __( '2.3.3 Header - Mobile Menu Button Bars Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'mobile_menu_button_color',
	  'priority' => '10',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_border_color', array(
		'label'        => __( '3. Global - Border Color Used Throughout', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'global_border_color',
	  'priority' => '11',
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_tab_hover_color', array(
		'label'        => __( '4. Navigation Tab Hover Color', 'bcsgsupport' ),
		'section'    => 'colors',
		'settings'   => 'navigation_tab_hover_color',
	  'priority' => '12',
	)));


	/*
	=======================
	 SET LOGO AND FAVICON
	======================= */

 	//MAIN LOGO
	$wp_customize->add_setting( 'theme_logo' );
	//FAVICON
	$wp_customize->add_setting( 'theme_favicon' );
	//APPLE ICONS
	$wp_customize->add_setting( 'theme_apple_icon_144' );
	$wp_customize->add_setting( 'theme_apple_icon_114' );
	$wp_customize->add_setting( 'theme_apple_icon_72' );
	$wp_customize->add_setting( 'theme_apple_icon_54' );
	
	//ADD CONTROLS
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_logo', array(
	  'label'    => __( '1. Header Logo', 'bcsgsupport' ),
	  'section'  => 'header_section',
	  'settings' => 'theme_logo',
	  'priority' => '1',
	)));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_favicon', array(
	  'label'    => __( '2.1. Favicon (16px x 16px)', 'bcsgsupport' ),
	  'section'  => 'header_section',
	  'settings' => 'theme_favicon',
	  'priority' => '2',
	)));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_apple_icon_144', array(
	  'label'    => __( '2.2. Apple Icon (144px x 144px)', 'bcsgsupport' ),
	  'section'  => 'header_section',
	  'settings' => 'theme_apple_icon_144',
	  'priority' => '3',
	)));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_apple_icon_114', array(
	  'label'    => __( '2.3. Apple Icon (114px x 114px)', 'bcsgsupport' ),
	  'section'  => 'header_section',
	  'settings' => 'theme_apple_icon_114',
	  'priority' => '4',
	)));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_apple_icon_72', array(
	  'label'    => __( '2.4. Apple Icon (72px x 72px)', 'bcsgsupport' ),
	  'section'  => 'header_section',
	  'settings' => 'theme_apple_icon_72',
	  'priority' => '5',
	)));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_apple_icon_54', array(
	  'label'    => __( '2.5. Apple Icon (54px x 54px)', 'bcsgsupport' ),
	  'section'  => 'header_section',
	  'settings' => 'theme_apple_icon_54',
	  'priority' => '6',
	)));


	/*
	=======================
	   SET MOBILE STUFF
	======================= */

	//MOBILE MENU BUTTON PADDING
	$wp_customize->add_setting( 'mobile_menu_top_margin', array(
   	'default' => '16px',
  ));
	$wp_customize->add_control( 'mobile_menu_top_margin', array(
    'label' => '1. Mobile Menu Button Margin',
    'section' => 'header_mobile',
    'type' => 'text',
	  'priority' => '1',
  ));
	
	/*
	=======================
	   SUPPORT SETTINGS
	======================= */
	
	//CHOOSE AN INITIAL ARTICLE
	$wp_customize->add_setting('displayed_post',array('default' => 'none',));
	$wp_customize->add_control('displayed_post',array(
    'type' => 'select',
    'label' => 'Initial Support Post',
    'section' => 'static_front_page',
    'choices' => getAllPostsAsSelectArray(),
	  'priority' => '1',
  ));

  /*
  =======================
	   SUPPORT SETTINGS
	======================= */

	//SET THE HEADER LOGO LINK URL
	$wp_customize->add_setting( 'site_header_url', array(
   	'default' => get_site_url(),
  ));
	$wp_customize->add_control( 'site_header_url', array(
    'label' => 'Site\'s Header URL (where you go when you click the logo)',
    'section' => 'title_tagline',
    'type' => 'text',
	  'priority' => '100',
  ));
}
add_action('customize_register', 'bcsgsupport_customizer');

/**
 * Take the setting above and render CSS
 **/
function mytheme_customize_css()
{
    ?>
    		<style type="text/css">
    			body { background: <?php echo get_theme_mod('body_background_color'); ?>; color: <?php echo get_theme_mod('body_text_color'); ?>; }
    			a, a:visited, h1, h2, h3 { color: <?php echo get_theme_mod('link_header_color'); ?>;}
    			a:hover, a:active { color: <?php echo get_theme_mod('link_hover_color'); ?>; }

        	.navbar-themed .navbar-inner { 
        		background: <?php echo get_theme_mod('header_background'); ?>;
        		color: <?php echo get_theme_mod('header_text'); ?>;
        	}
        	.navbar-themed .navbar-inner .nav-collapse ul>li>a { color: <?php echo get_theme_mod('header_text'); ?>; }
        	.navbar .btn-navbar { 
        		margin-top: <?php echo get_theme_mod('mobile_menu_top_margin'); ?>;
            border-color: <?php echo get_theme_mod('mobile_menu_button_border'); ?>;
            background: <?php echo get_theme_mod('mobile_menu_button_background'); ?>;
            color: <?php echo get_theme_mod('mobile_menu_button_color'); ?>;
          }
          .navbar .btn-navbar:hover {
          	color: inherit;
          	background: <?php echo get_theme_mod('mobile_menu_button_background_hover'); ?>;
          }

          .nav-tabs {
          	border-bottom-color: <?php echo get_theme_mod('global_border_color'); ?>;
          }
          .nav-tabs>li>a {
          	border-color: <?php echo get_theme_mod('global_border_color'); ?>;
          }
          .nav-tabs>li>a:hover {
          	border-color: <?php echo get_theme_mod('global_border_color'); ?>;
          	background: <?php echo get_theme_mod('navigation_tab_hover_color'); ?>;
          }

          .accordion-group {
          	border-color: <?php echo get_theme_mod('global_border_color'); ?>;
          }
          .accordion-inner {
          	border-top-color: <?php echo get_theme_mod('global_border_color'); ?>;
          }

          hr {
          	border-bottom:none;
          	border-top-color: <?php echo get_theme_mod('global_border_color'); ?>;
          }


         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
remove_filter( 'the_content', 'wpautop' );


function getAllPostsAsSelectArray(){
	/*$args = array( 'posts_per_page' => 5 );
	$posts = get_posts( args );

	$selectArray = array();
	foreach ($posts as $post) {
		$selectArray['p='+$post->ID] = get_the_title($post->ID);
	}*/

	$args = array('numberposts' => 999);

	$posts = get_posts($args);		
	$selectArray = array('none' => 'Pick One...', null => "=======");
	
	foreach ($posts as $post) {
		$selectID = "p={$post->ID}";
		$selectArray[ $selectID ] = get_the_title($post->ID);
	}

	return $selectArray;
}
?>