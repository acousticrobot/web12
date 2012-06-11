<?php
/*
*	Custom header info for lab pages
*	adds paper.js and adds the string found in the custom field 'script'
*
*		Uses script-keys custom field to add custom scripts
*		script-keys: type*URL,type*URL... 	
*		example: paper*lab120229
* 		Scripts are added from theme /js folder		 
*		and are appended with .js
*		script names should be enqueue friendly (lowercase string)
*		types: js (for generic),raphael,paper,fx (to add dependencies)
*		type paper also adds scripts as text/paperscript
*
*	Called by: header.php before wp_head()
*	v1.5
*
*	TODO: 	-add paper, but then add script as regular js
*			-add canvas name other than ctx
*/
?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/canvasStyles.css">

<?php
	
	function add_paperscript($script,$list) {	
		$list .= "<script type=\"text/paperscript\" src=\"";
		$list .= get_bloginfo('template_directory') ."/js/". $script;
		$list .= ".js\" data-paper-canvas=\"ctx\"></script>
	"; // line feed
	
		return $list;
	}
	
	function add_script($script,$list) {
		$list .= "<script type=\"text/javascript\" src=\"";
		$list .= get_bloginfo('template_directory') ."/js/". $script;
		$list .= ".js\" ></script>
	"; // line feed
	
		return $list;
	}
	

	function set_scriptkeys(){
		global $post;
		$scriptCF = get_post_meta($post->ID, 'script-keys', true);	
		$script_list = "";
		if (!empty($scriptCF)) :
			$scripts = explode(',',$scriptCF);
			foreach ($scripts as $keys) {
				$script = explode('*',$keys);
				switch ($script[0]) {
					case 'paper':
						wp_enqueue_script('paper');
						break;
					case 'raphael':
						wp_enqueue_script('raphael');
						break;
					case 'fx':
						wp_enqueue_script('fx');
						break;										
				}		
			}		
		endif;
	}

	function list_scriptkeys(){
		global $post;
		$scriptCF = get_post_meta($post->ID, 'script-keys', true);	
		$script_list = "";
		if (!empty($scriptCF)) :
			$scripts = explode(',',$scriptCF);
			foreach ($scripts as $keys) {
				$script = explode('*',$keys);
				if ($script[0] == 'paper') {
					$script_list = add_paperscript($script[1],$script_list);
				} else	{
					$script_list = add_script($script[1],$script_list);
				}
			}				
		endif;
		return $script_list;
	}
	
?>

