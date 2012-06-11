<?php 
	$templateID = '404';

	get_header(); 
?>

	<h2>Error 404 - Page Not Found</h2>

	<nav id="mainSideNav">
		<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
	</nav> <!-- mainSideNav -->
		
	<div id="innerWrapper">	
	
	<h2>So sorry!</h2>
	<p>I'm updating the site to run with WordPress, and in the process a lot of links are going to be broken.  I'm working on making a page of redirects, but in the meantime please <a href="mailto:writeme@jonathangabel.com?subject=update%20page%20request">email</a> me anything you can't find, and I will fix the link right away.</p>
	<p>You can look under PROJECTS for a list of pages that have been added since the move</p>
	<p>Also check under ARCHIVES  for a list of the most recent posts.</p>

	</div>
	
<?php get_footer(); ?>