<?php 
	/* 	Loop for listing course content. Lists pages first, then posts (inc. status posts)
	*
	*
	*  Called by: mainset-students page, template-course pagesz

	*	------------------------------------------------------------------------------------
	*	Pages must use custom-field 'course-keys' to list course contents

	* 	course-keys:	post-category|title|page=ID

	* 	local values:	dma105|Intro to Digital Media Arts|424, 
						art125|Topics in Contemporary Art|374 

	* 	remote values:	dma105|Intro to Digital Media Arts|468, 
						art125|Topics in Contemporary Art|374 
	*	v1.0 				
	*/
	
	wp_enqueue_script('hoverIntent');
	wp_enqueue_script('coursescript'); // big-clickable links

	$coursesCF = get_post_meta($post->ID, 'course-keys', true);	

	if (!empty($coursesCF)) :
		
		if (preg_match('/,/', $coursesCF)) { // more than one course
			$courseListType = 'directory';
			$courseList = explode(',',$coursesCF);
		} else {
			$courseListType = 'single';
			$courseList[0] = $coursesCF;			
			// ex: $courseList[0] = "dma105|Intro to Digital Media Arts|424"...
		};
?>
	
		

<?php

	foreach ($courseList as $course ) {
	
		$courseInfo = explode('|', $course);
		$slug = $courseInfo[0];
		$title = $courseInfo[1];
		$courseID = $courseInfo[2];
		$link = get_permalink($courseInfo[2]);

		if ($courseListType == 'directory') : 	// multi-course list ?>
			
			<div class="course <?php echo $slug ?>">
				
				<div class="course-link">
					<div class="course-seal"></div>
					<h2><a href='<?php echo $link ?>'><?php echo $slug." - ".$title ?></a></h2>
				</div>

					<ul class='course-pages'>
					
<?php 	else : 									// single course list ?>
		
			<div class="course <?php $slug ?>">
				
				<h4>Class Resources:</h4>

					<ul class='course-pages'>


<?php	endif; 									// END directory or single ?>
		
			
	
<?php		// list titles of all pages under this course
		query_posts("posts_per_page=-1&post_type=page&post_parent=$courseID");					
		while (have_posts()) : the_post();?>
			
					<li>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</li>

<?php
		endwhile; wp_reset_query(); ?>
				
					</ul>
 
				<ul class='course-posts'>
		<?php 		
		
	
				// list titles of all posts under this course
		
				query_posts("category_name=$slug");
		
				while (have_posts()) : the_post(); 
		
				if ( !has_post_format( 'status')) { // style as a regular post 
					
					if ( ($courseListType == 'single') && has_post_thumbnail()) { ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(thumbnail); ?>
						</a>
<?php 				} ?>

				<li class= "class-listing">

					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					
					<span class ="meta"><?php the_date('m-d-Y'); ?></span>
					</h3>

					<?php 
						if ( $courseListType == 'single' ) {
							global $more;
							$more = 0;
					  		the_content('more...');
							echo '<div class="clear"></div>';
						} 
					?>

				</li>

<?php 			} else { // it's a status update ?>

				<li>
					<div class="status"><?php the_content(); ?></div>
				</li>

<?php 
		  	};		
		
		endwhile; wp_reset_query(); ?>
					
				</ul>
			</div>				
<?php 
	
	};	// END foreach

	
	endif; // $coursesCF NOT empty	
?>