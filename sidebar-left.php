<aside id="sidebar-left" class="sidebar">

	<?php  if ( is_active_sidebar( 'left' ) ) : ?>

		<?php dynamic_sidebar( 'left' ); ?>

	<?php else : ?>

		<?php $featured = array("Main" 	=> "#",
								"T47"	=> "projects/T47",
								"Art125"=> "students/Art125",
								"Dma105"=> "students/Dma105"
								); ?>

		<!-- <h2>Featured:</h2> -->
		
		<?php foreach ($featured as $feature => $link ) :  ?>
		
		<ul>
			<li>
				<div class="feature">
					<div class="seal <?php echo $feature ?>">
					<a class="feature-tag" href="/<?php print $link ?>"><img src="/images/nav/ripMainTag.png" alt="main"/></a>
					</div>
				</div>
			</li>
		</ul>

		<?php endforeach; ?>



	<?php endif; ?>
	
</aside>

