[B][] [C][] [N][] [P][] [S][]
## [B]

### Badges

Badged are in inc/badge.php
Mainset are all linked back to homepage.

## [C]

### Custom Fields

  * [nav-keys][nav-keys]: custom side navigation 

### Custom Taxonomies

#### Artworks

? Where does the unique catalogue number go?  In a custom field ?

  * year
  * Dimensions
  * Media (tags)
  * Project
  * Featured Image

archive-artworks.php

content-artworks.php

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

