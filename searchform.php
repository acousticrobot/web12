<?php
/*
* 	CALLED BY: 	header within main nav menu
*	TRIGGER: 	get_search_form() looks in theme top directory for searchform.php
*	CALLS TO:	get
*  	v 2.0	 
*/
?>

<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
    <div id="search">
        <label for="s" class="screen-reader-text">Search for:</label>
        <div id="field"><input type="text" id="s" name="s" value="" /></div>
    </div> <!-- search  -->
</form>