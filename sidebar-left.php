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
						style="background-image : url('/images/nav/<?php echo $feature ?>seal.png');">
						
						<a class="feature-tag" href="/<?php print $link ?>">
							<img src="/images/nav/<?php echo $feature ?>IconTab.png" alt="main"/>
						</a>
					</div>
				</div>
			</li>
		<?php endforeach; ?>
		</ul>


	<?php endif; ?>
	
</aside>

