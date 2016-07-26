BCSG Demo Site
==============

Last updated 7/1/2016

STAHHPPPPP!!! Before you change anything you might want to have a read of this - it may hopefully make things easier for you.


The Files We Have
-----------------

At the moment, the current structure of this directory is fairly simple. There's a lot of wordpress stuff, most of which you won't need to look at.

There are also a few files you'll probably be changing a lot depending on what you need to do. The main ones will be:

- The html/php files => Our pages and modules
	- front-page.php is the home page and all of its modules are contained in the ./wp-content/themes/bcsg-demo-theme/front-page-modules folder
	- page-product-bonline.php, page-product-plan-hq.php, page-product-receipt-bank.php and page-product-sage.php are all the product page, and all the modules are contained in the ./wp-content/themes/bcsg-demo-theme/product-page-modules folder
	- header.php, which is the header for each of these pages
	- footer.php, the footer for each of the pages
- The javascript files. These are all kept under the ./js/ folder, which compiles to a minified JS file with grunt, ./wp-content/themes/bcsg-demo-theme/js/main.min.js. 
- The CSS files. These are written in SASS and are all kept in the ./scss folder, which compiles into a minified CSS file ./wp-content/themes/bcsg-demo-theme/vanilla-clone.min.css.


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

We can change all the content by logging onto Wordpress and amending the posts. Each post has been placed in one category, either the Home Page or one of the Product Pages, or All Products or Testimonials. They have also been given a tag. This is so our pages know what content to put where (if you look at the files in the front-page-modules folderf for example, you can see the query posts that are detailing which category to look in and )


Each page has been given some php variables - each of those variables is then fed into the local templates, so that we can find the post with the content that's relevant to the page we're viewing (especially useful for the product pages, as they each use the same template but obviously have different content)










Explain what this means:
<?php include(locate_template('front-page-modules/home-page-intro-module.php')); ?>

And explain this little thing:
<?php query_posts('&tag=keyfeature2&cat='.$catid); while (have_posts()) : the_post(); the_content(); endwhile; wp_reset_query(); ?>


<?php query_posts('&tag="featuresmodule"&cat='.$catid); while (have_posts()) : the_post(); if (function_exists('the_content_part')) ?><?php endwhile; wp_reset_query();?>







Explain wordpress the_title() and the_content()




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