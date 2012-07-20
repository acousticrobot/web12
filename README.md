[A][] [B][] [C][] [F][] [N][] [P][] [S][]
## [A]

### Archives

There are several pages that are associated with the term 'archive'.
  * Archive page: jg.com/archive handled by the template-archive and running its own logic.
  * Archive.php handles queries from the search 

## [B]

### Badges

Badged are in inc/badge.php
Mainset are all linked back to homepage.

## [C]

### Custom Fields

There a several more custom fields on my local version, but I'd like to keep them all to a minimum.

  * course keys: students something?
  * due-date: cf used on homeworks
  * intro-p: toki pona formatting issues I think
  * is index page: used on mainset to list the pages associated with it.

  * [nav-keys][nav-keys]: custom side menu navigation button
  * subtitle: Originally for the toki pona head page, this is also used on the archive page for page listings. 

### Categories

	query_posts('category_name=projects');

DEPRECIATED: Student news no longer a category, this can go on the top of the student page.

### Custom Taxonomies


#### Artworks

? Where does the unique catalogue number go?  In a custom field ?

  * year
  * Dimensions
  * Media
  * Categories (was once Project)
  * Tags
  * Featured Image

archive-artworks.php

content-artworks.php
## F

### Filters

As far as I can tell, the best practice is:
Main Query: use pre_get_post to alter the main query
Additional queries: use get\_posts($args) or WP_Query
DON'T use query\_posts()

[best explanation so far](http://wordpress.stackexchange.com/questions/1753/when-should-you-use-wp-query-vs-query-posts-vs-get-posts)

#### Main Query

This is run in fnx-filters.php
references:
http://www.billerickson.net/customize-the-wordpress-query/
http://wordpress.org/support/topic/custom-post-type-tagscategories-archive-page
http://designpx.com/tutorials/custom-post-types-author-archive/
http://codex.wordpress.org/Class_Reference/WP_Query


#### Additional Queries

Filtering the query to accept different types:

	$args = array(
	    'numberposts'     => 20,
	    'offset'          => ,
	//    'category'        => ,
	    'orderby'         => 'post_date',
	    'order'           => 'DESC',
	//    'include'         => ,
	//    'exclude'         => ,
	//    'meta_key'        => ,
	//    'meta_value'      => ,
	    'post_type'       => array('artworks','page','post'),
	//    'post_mime_type'  => ,
	//    'post_parent'     => ,
	    'post_status'     => 'publish' );
		
	$posts_array = get_posts( $args );	

Example found in inc/query-filter, used on archive page.

(parameters listed here)[http://codex.wordpress.org/Template_Tags/get_posts]
(or)[http://codex.wordpress.org/Function_Reference/wp_list_pages]

## [N]

### Navigation

#### Sidebars

  * declared in functions
  * called in footer
  * defined in sidebar-left, sidebar-right

##### Left Sidebar

Static declaration of featured projects with links.  

Structure:

	div.feature => bkg. image of rip
		div.seal{type} => bkg. image of seal{type}, 
			a link to page{type} 
				image of sealIcon{type} // mostly transparent overlay.

seal image is an in-line style base on type.

##### Right Sidebar

	
#### Side Menus

The side menu is created in ID side menu. It comes right after the title header:

	<h2>php generated page title</h2>
	
	<nav id="sideMenu">
		...
	</nav>								

This can be attached on a per project or per page basis:

##### Per-Project Side Menu

Templates can call side menus on a per-project basis, if the menu needs to be customized manually.  This is how it works for the the t47 template.  It calls T47side menu and inserts it in:

	<nav id="sideMenu">
		<?php include (TEMPLATEPATH . '/inc/t47sidemenu.php' ); ?>
	</nav>														

##### Per Page or Post Side Menu [nav-keys]

Any page can have a customized side-menu navigation link.

  * In Custom Fields:
	  * Name: nav-keys
	  * Value: label|link,label|link

examples:

*ART125*

	slides|/documents/art125/slides-min.pdf,
	slidelist|/documents/art125/slidelist-min.html,
	readings|/documents/art125/readings-min.pdf

## [P]

### Pages

#### Projects Page

#### Archive Page

#### Posts Page

#### Design Page

Design page for content loaded within WordPress page.  All text is in markdown, images loaded with HTML a tags referencing /images/design/tag_thumb.img, dimensions 150 x 150.

classes:
  * design-image : floating thumbs

## [S]

### Shortcode

	inc/shortcode.php

#### homeworks list

#### galleria

shortcode for creating a gallery with images in the main image directory

version 1.0

example formatting within post entry:

	<div id="photo"></div>
    <div id="gallery">
		[galleria dir="/images/t55/" prefix="t55." s_suffix="s" l_suffix="m" type="png"]
		file1*Title One*2,file2*Title Two[/galleria]
	</div>
	<div class = "clear"></div>

so this:
	
		[galleria dir="/images/t29/" prefix="t29."]1**5[/galleria]

produces:

		/images/t29/t29.1_1_s.jpg ... /images/t29/t29.1_5_s.jpg

