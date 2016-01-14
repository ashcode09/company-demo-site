BCSG Demo Site
==============

Last updated 7/1/2016

STAHHPPPPP!!! Before you change anything you might want to have a read of this - it may hopefully make things easier for you.

At the moment, the current structure of this directory is fairly simple. There's a lot of wordpress stuff, most of which you won't need to look at.

There are also a few files you'll probably be changing a lot depending on what you need to do. The main ones will be:

- The html/php files => Our pages and modules
	- front-page.php is the home page and all of its modules are contained in the ./wp-content/themes/bcsg-demo-theme/front-page-modules folder
	- page-product-bonline.php, page-product-plan-hq.php, page-product-receipt-bank.php and page-product-sage.php are all the product page, and all the modules are contained in the ./wp-content/themes/bcsg-demo-theme/product-page-modules folder
	- header.php, which is the header for each of these pages
	- footer.php, the footer for each of the pages
- The javascript files. These are all kept under the ./js/ folder, which compiles to a minified JS file with grunt, ./wp-content/themes/bcsg-demo-theme/js/main.min.js. 
- The CSS files. These are written in SASS and are all kept in the ./scss folder, which compiles into a minified CSS file ./wp-content/themes/bcsg-demo-theme/vanilla-clone.min.css.





Before You Change Anything
--------------------------

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


















Don't forget to upload the scss and js files when you're done!





How to add pages on Wordpress
-----------------------------




to amend content, go to WordPress wp-administration, and amend the posts


To add more products??? What about home page, will that change with more products, and the header nav options?






How To Change Content on Wordpress
----------------------------------

Log in to the domain /wp-admin and click on 'Posts' on the left hand side of the page.

You can search for the content that you want to change in the search bar on the top right - make sure not to change the tag or the category of the post you're amending, as these are specified on the php pages, it's how they pull the content in!


