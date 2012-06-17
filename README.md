[C][] [N][] [P][] [S][]

## [C]

### Custom Fields

  * [nav-keys][nav-keys]: custom side navigation 

## [N]

### Navigation

#### Sidebars

  * declared in functions
  * called in footer
  * defined in sidebar-left, sidebar-right

##### Left Sidebar

Static declaration of featured projects


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

