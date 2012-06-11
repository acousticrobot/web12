<?php
/*

it may be possible to create an auto menu with: wp_nav_menu(array('menu' => 'T47 Side Navigation'))
but also needs hoverIntent or superfish.

	called by template-T47.php
	v1.0
*/

?>

<ul class="sf-menu sf-vertical">  <!-- hover intent styles -->
	<li class="sub"><a href="<?php echo ABSPATH . "/projects/t47/lessons"?>">lessons</a>
		<ul>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-1"?>">lesson 1</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-2"?>">lesson 2</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-3"?>">lesson 3</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-4"?>">lesson 4</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-4b"?>">lesson 4b</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-5"?>">lesson 5</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-6"?>">lesson 6</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-7"?>">lesson 7</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-8"?>">lesson 8</a></li>
       		<li><a href="<?php echo ABSPATH . "/projects/t47/lessons/lesson-9"?>">lesson 9</a></li>
		</ul>
	</li>
	<li class="sub"><a href="<?php echo ABSPATH . "/projects/t47/dictionaries"?>">dictionaries</a>
		<ul>
			<li><a href="<?php echo ABSPATH . "/projects/t47/dictionaries/glyphs"?>">word glyphs</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/dictionaries/syllabary"?>">syllabary</a></li>
			<li><a href="<?php echo ABSPATH . "/projects/t47/dictionaries/drawing_steps"?>">drawing</a></li>
		</ul>
	</li>               
	<li><a href="<?php echo ABSPATH . "/projects/t47/gallery"?>">gallery</a></li>
	<li><a href="<?php echo ABSPATH . "/projects/t47/t47-links"?>">links</a></li>
</ul>
