<?php
/*
*	Description: Main Template for home page
*	
*	CALLED BY: URL
*	TRIGGER: home: jonathangabel.com/
*	CALLS TO:	HEADER->home-head, main side nav, loop-carousel, loop-status, FOOTER
*  	v 2.0	 
*/
?>

<?php get_header(); ?>
	
<h2>recent additions:</h2>

<nav id="mainSideNav">
	<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
</nav> <!-- mainSideNav -->

<div id="leftArrow"></div>
<div id= "cabinet">
	<?php get_template_part('loop','carousel');?> 
</div><!-- cabinet-->
<div id="rightArrow"></div>

<section>
	<aside>
		<h2><a id="news" href="#" >News</a></h2>
		<div class="scroll-pane">
		<?php get_template_part('loop','status');?> 
		<?php wp_reset_query();	?> 
		</div>
	</aside>
		
	<div id= "pictureblock">
		<canvas id="ctx" ></canvas>
	</div>				
</section>
	
<?php get_footer(); ?>