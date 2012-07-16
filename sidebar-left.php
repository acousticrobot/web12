<?php
/*
*	Description: dynamic sidebar - left side
*
*	simplified, removed call to: 
*	<div class="seal <?php echo $feature ?>" 
*		style="background-image : url('/images/nav/seal-<?php echo $feature ?>.png');">
*		<a class="feature-tag" href="/<?php print $link ?>">
*		<img src="/images/nav/icon-<?php echo $feature ?>.png" alt="main"/>
*		</a>
*	</div>
*
* 		
*
* 	CALLED BY: footer
*	TRIGGER: 
*	CALLS TO:	
*  	v 2.0	 
*/
?>

<aside id="sidebar-left" class="sidebar">

	<?php  if ( is_active_sidebar( 'left' ) ) : ?>

		<?php dynamic_sidebar( 'left' ); ?>

	<?php else : ?>

		<?php $featured = array("home" 	=> "",
								"t47"	=> "projects/T47",
								"art125"=> "students/Art125",
								"dma105"=> "students/Dma105",
								"artworks" => "artworks"
								); ?>

		<!-- <h2>Featured:</h2> -->
		<ul>
		<?php foreach ($featured as $feature => $link ) :  ?>
			<li>
				<div class="feature">
					<div class="seal <?php echo $feature ?>"
							style="background-image : url('/images/nav/seal-<?php echo $feature ?>.png');">
						<a class="feature-tag" href="/<?php print $link ?>">
							<img src="/images/nav/sidebar-hoverspace.png" alt="<?php $feature ?>"/>
						</a>
					</div>
				</div>
			</li>
		<?php endforeach; ?>
		</ul>


	<?php endif; ?>
	
</aside>

