BCSG Demo Site
==============

To set up locally




STAHHPPPPP!!! Before you change anything you might want to have a read of this - it may hopefully make things easier for you.


The Files We Have
-----------------

At the moment, the current structure of this directory is fairly simple. There's a lot of wordpress stuff, most of which you won't need to look at.

There are also a few files you'll probably be changing a lot depending on what you need to do. The main ones will be:

- The html/php files => Our pages and modules within those pages
	- front-page.php is the home page and all of its modules are contained in the ./wp-content/themes/bcsg-demo-theme/front-page-modules folder
	- page-product-bonline.php, page-product-plan-hq.php, page-product-receipt-bank.php and page-product-sage.php are all the product pages, and all the modules are contained in the ./wp-content/themes/bcsg-demo-theme/product-page-modules folder
	- header.php, which is the header for each of these pages
	- footer.php, the footer for each of the pages
- The javascript files. These are all kept under the ./js/ folder, which compiles to a minified JS file with grunt, ./wp-content/themes/bcsg-demo-theme/js/main.min.js. This main.min.js file is what is being read, so if you've changed some of the javascript files, you need to make sure you're running grunt to compile your changes.
- The CSS files. These are written in SASS and are all kept in the ./scss folder, which compiles into a minified CSS file ./wp-content/themes/bcsg-demo-theme/vanilla-clone.min.css. Again, make sure you're running grunt when you make .scss changes!


Plugins
-------

We currently have the following plugins:

- Content Parts
  - This allows us to divide a post into different parts that we can call in our *.php templates. This makes it easier for us to edit content later, because rather than having several small posts for one module on a page, we can have 1 large one that we can edit.
- MiwoSQL
  - Allows us to query our Wordpress database - you might not necessarily need it but it can come in useful


Before You Change Anything - Install
------------------------------------

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

<?php query_posts('&tag="featuresmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?><?php endwhile; wp_reset_query();?>







Explain wordpress the_title() and the_content(), within the loop!!!!!




EXPLAIN WHAT Content Parts plugin is. Also explain that if we add a content part in the middle of a post already being used, we need to amend the *.php files that call all the parts after it (as we can only call the parts by the order in which they're in the post, not by giving them a name, unfortunately :( )








Don't forget to upload the scss and js files when you're done!





How to add pages on Wordpress
-----------------------------




to amend content, go to WordPress wp-administration, and amend the posts


To add more products??? What about home page, will that change with more products, and the header nav options?






How To Change Content on Wordpress
----------------------------------

Log in to the domain /wp-admin and click on 'Posts' on the left hand side of the page.

You can search for the content that you want to change in the search bar on the top right - make sure not to change the tag or the category of the post you're amending, as these are specified on the php pages, it's how they pull the content in!








DON'T FORGET TO ACTIVATE ALL THE PLUG INS :)











Pages
-----

Each page you see in wp-admin is a product page, and tied into the navbar/header; every time a page is added, its title and link is automatically added to the header, and every time one is removed, it's automatically removed from the header.





How we connect our php pages to our wordpress pages

When we want to add a product page





Our pages currently pull in different data from our posts - depending on the posts' category and/or tag





Posts
-----

Where we keep our content.

Log in to /wp-admin to see the posts and be able to edit them.

These are the categories we currently have:
- Home Page (for all content that's exclusively on the home page - the front-page.php)
- Product Plan HQ (for all content that's exclusively feeding into the Plan HQ product page modules - except the testimonials module)
- Product Receipt Bank (for all content that's exclusively feeding into the Receipt Bank product page modules - except the testimonials module)
- Product BOnline (for all content that's exclusively feeding into the BOnline product page modules - except the testimonials module)
- Product Sage (for all content that's exclusively feeding into the Sage product page modules - except the testimonials module)
- All Products (for all content that's on all the product pages - such as titles of sections and images)
- Testimonials (for all the testimonials we have at the bottom of the product pages - you can add or take as many as you want, the testimonials section will add them and their respective buttons automatically as long as they're in this category)
- Contact Details (the contact email address and phone numbers - currently only in the footer but can be referenced elsewhere)
- All Pages (for all content that appears across all pages, currently only the footer content is here)



If adding or removing content-part dividers in posts, you will have to amend the template that calls it (just search through the files for the tag of the post), as the content


If you add or remove product pages, then the breakpoint for the header collapsed will need to be amended :)





EXPLAIN HELP SITE



Make sure all plugins are activated for the Help site too!!!