BCSG Demo Site
==============

Last updated 7/1/2016

STAHHPPPPP!!! Before you change anything you might want to have a read of this - it may hopefully make things easier for you.

At the moment, the current structure of this directory is fairly simple. There's a lot of wordpress stuff, most of which you won't need to look at.

There are also a few files you'll probably be changing a lot depending on what you need to do. The main ones will be:

- The html/php files => Our pages and modules within those pages
	- front-page.php is the home page and all of its modules are contained in the ./wp-content/themes/bcsg-demo-theme/front-page-modules folder
	- page-product-bonline.php, page-product-plan-hq.php, page-product-receipt-bank.php and page-product-sage.php are all the product pages, and all the modules are contained in the ./wp-content/themes/bcsg-demo-theme/product-page-modules folder
	- header.php, which is the header for each of these pages
	- footer.php, the footer for each of the pages
- The javascript files. These are all kept under the ./js/ folder, which compiles to a minified JS file with grunt, ./wp-content/themes/bcsg-demo-theme/js/main.min.js. This main.min.js file is what is being read, so if you've changed some of the javascript files, you need to make sure you're running grunt to compile your changes.
- The CSS files. These are written in SASS and are all kept in the ./scss folder, which compiles into a minified CSS file ./wp-content/themes/bcsg-demo-theme/vanilla-clone.min.css. Again, make sure you're running grunt when you make .scss changes!





Before You Change Anything
--------------------------

Go into command line and navigate into the root directory.

Install NodeJS, then install the dependencies with 'npm install'.

You can run Grunt with the command 'grunt'. Grunt will watch for any changes you make to the *.scss and *.js files, and will run SASS to compile the vanilla-clone.css and vanilla-clone.min.css files, and will run contrib and uglify to compile the main.js and main.min.js files.







How It Works
------------

We can change all the content by logging onto Wordpress and amending the posts. Each post has been placed in one category, either the 'Home Page' or one of the Product Pages, or 'All Products' or 'Testimonials'. They have also been given a tag. This is so our pages know what content to put where (if you look at the files in the front-page-modules folder for example, you can see the query posts that are detailing which category to look in and which part of the post to show)


Each page has been given some php variables - each of those variables is then fed into the local templates, so that we can find the post with the content that's relevant to the page we're viewing (especially useful for the product pages, as they each use the same template but obviously have different content)









Editing the PHP Pages
----------------------

You might need to read up a bit on PHP and how to write loops, declare variables, etc... but here are a few explanations on some of the Wordpress functions that are in the .php files.

What this means:

<?php include(locate_template('front-page-modules/home-page-intro-module.php')); ?>

<?php include(locate_template('[INSERT FILE ADDRESS AND NAME HERE]')); ?> is pointing to a html template we have written and saved in our code.
The address in the middle is pointing at the folder where the current page is sat, so if we see the above address in C:\Users\ashleigh.maund\Documents\projects\bcsg-demo-site\wp-content\themes\bcsg-demo-theme\front-page.ftl, then we know it is pointing to C:\Users\ashleigh.maund\Documents\projects\bcsg-demo-site\wp-content\themes\bcsg-demo-theme\front-page-modules/home-page-intro-module.php.


And what this means:

<?php query_posts('&tag=keyfeature2&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>

<?php query_posts('[INSERT INFO ABOUT POST HERE]'); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?> will show a specific post by querying information about it; this information can be a 'tag' or a 'cat' (category), or both, and is essentially a database query.
The 'tag' and 'cat' will be defined in the post itself. In the above example, the $catid variable had already been defined earlier in the page, the '.' concantenates the $catid to the rest of the query that is in the string. So we are looking for all posts with the tag 'keyfeature2' in category $catid (as long as it's a string).
The query_posts() Wordpress function finds all the posts that match what you've provided, and with the_content(), the content of that post is shown (similarly, if you were to change it for the_title(), you would show the title of that post).
wp_reset_query() resets the query, which has been added because query_posts() overrides any regular post loops that may come after it, so adding wp_reset_query() after every query_posts() prevents this.


Aaaand, what this means:







Explain wordpress the_title() and the_content(), within the loop!!!!!










Don't forget to upload the scss and js files when you're done!





How to add pages on Wordpress
-----------------------------




to amend content, go to WordPress wp-administration, and amend the posts


To add more products??? What about home page, will that change with more products, and the header nav options?






How To Change Content on Wordpress
----------------------------------

Log in to the domain /wp-admin and click on 'Posts' on the left hand side of the page.

You can search for the content that you want to change in the search bar on the top right - make sure not to change the tag or the category of the post you're amending, as these are specified on the php pages, it's how they pull the content in!


