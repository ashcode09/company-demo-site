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
          <a class="navbar-brand brand-img" onclick="goHere('topOfPage')"><img id="brandImgDarkBg" class="showOnDarkBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/logo.png" /><img id="brandImgLightBg" class="showOnLightBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/logo-lightbg.png" style="display: none"/></a>
          <a onclick="navbarCollapseToggle('#navBarCollapse', 'opened')" class="menu-btn" id="menuBtn"><img class="showOnDarkBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/navbar-collapse-icon.png" /><img class="showOnLightBg" src="<?php bloginfo('template_directory');?>/../bcsg-demo-theme/img/navbar-collapse-icon-grey.png" /></a>
        </div>
        <div class="nav-bar-collapse" id="navBarCollapse">
          <ul class="nav navbar-nav menu-nav col-md-9">
            <li><a href="/" class="nav-options" onclick="closeNavBarAndPullPageBack('#navBarCollapse', 'opened')">Home</a></li>
            <li><a href="/plan-hq/" class="nav-options">Business Planning</a></li>
            <li><a href="/receipt-bank/" class="nav-options">Expense Management</a></li>
            <li><a href="/bonline/" class="nav-options">Website Builder</a></li>
            <li><a href="/sage/" class="nav-options">Bookkeeping &amp; Payroll</a></li>
          </ul>
          <ul class="nav navbar-nav login-nav col-md-3">
            <li><a href="/help/" class="nav-options">Help</a></li>
            <li><a href="http://mtdev.mybusinessworks.co.uk/Vanila/ssprovision.do?r1=ytovoFVX3zfruB0XO6iR09Oiuzo=" class="nav-options">Sign up</a></li>
            <li><a href="http://mtdev.mybusinessworks.co.uk/Vanila/" class="nav-options last-in-nav">Log in</a></li>
          </ul>
        </div>
      </div>
    </div>