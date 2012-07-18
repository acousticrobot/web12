<?php


	// shortcode for listing homeworks excerpt and link
	// content should be homework slugs separated by commas
	// example: [homeworks]abex-readings,pop-readings[/homeworks]
	// use [homeworks view="full"] to list content instead of excerpt
	// use due_date custom field to list the due date of assignment
	
function homeworks_func($atts, $content=null){ //v1.0
	extract( shortcode_atts( array(
			'show' => 'list',
		), $atts ) );
	$assignments = ''; // string to return
	$homeworks = explode(',',$content);
	foreach ($homeworks as $homework ) {
		$query_string = 'post_type=homework&name=' . $homework;
		$the_query = new WP_Query( $query_string);
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$assignments .= '<h2><a href="';
		 	$assignments .= get_permalink(); 
			$assignments .= '">'; 
			$assignments .= get_the_title(); 
			$assignments .= '</a></h2>';
			$dueCF = get_post_custom_values('due_date'); // get_post_meta() didn't work
			if (!empty($dueCF))	{
				$assignments .= '<p class="due-date">Due: ';
				$assignments .= $dueCF[0];
				$assignments .= '</p>';
			};
			$assignments .= '<p>';
			if ($show == 'full') {
				$assignments .= get_the_content();
			} else {
				$assignments .= get_the_excerpt();
			}
			$assignments .= '</p>';
		endwhile;
		wp_reset_query();	
	}
	return $assignments;
}

add_shortcode( 'homeworks', 'homeworks_func' );



/* 	shortcode for creating a gallery with images in the main image directory
* 	version 1.0
*
*	example formatting:
*   <div id="photo"></div>
*   <div id="gallery">
*   	[galleria dir="/images/t55/" prefix="t55." s_suffix="s" l_suffix="m" type="png"]
*   		file1*Title One*2,file2*Title Two[/galleria]
*   </div>
*   <div class = "clear"></div>
*/
	
function galleria_func($atts,$content=null) {
	wp_enqueue_script('gallery');
	extract( shortcode_atts( array(
				'class' => '', 		// add css class to gallery TODO
				'dir' =>'/images/',	// defaults to root image folder
				'prefix' => '',
				's_suffix' => '_s',
				'l_suffix' => '_l',
				'type' => 'jpg', 	// defaults to jpg images
			), $atts ) );
	$galleria = '';
	$image_set = explode(',',$content);
	foreach ($image_set as $image) {		
		$img = explode("*", $image);
		$file_name = $img[0];
		$name = $img[1];
		$versions = $img[2]; // optional versions number for multiple images

		if ( $img[2] != null) $j = $img[2];
		else $j = 1;

		for ($i = 1; $i <= $j; $i++) {
			if ( $versions != null) $v = $i;
			else $v = ''; 
			$button = "{$dir}{$prefix}{$file_name}_{$v}{$s_suffix}.{$type}";
			$image = "{$dir}{$prefix}{$file_name}_{$v}{$l_suffix}.{$type}";
			$button_root = $_SERVER{'DOCUMENT_ROOT'}.$button;
			$image_root = $_SERVER{'DOCUMENT_ROOT'}.$image;
			if ( file_exists($button_root) && file_exists($image_root) ) {
				$galleria .= "<div class=\"gallery-links\">";
				$galleria .= "<a class=\"linkbutton\" ";
				$galleria .= "style = \"background-image: url({$button});\"" ;
				$galleria .= "href=\"{$image}\"></a>";
				$galleria .= "<p>{$name}</p>";	
				$galleria .= "</div>";
			} else {$galleria .= "<!-- no such file: {$image_root} -->";}
		} // end for $i <= 2		
	} // end foreach
	return $galleria;
}

add_shortcode( 'galleria', 'galleria_func' );


?>