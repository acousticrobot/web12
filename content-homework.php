<?php
  /**
  *   content for homeworks
  *   Displays single post content, includes #innerWrapper
  *
  *   Called by: single.php via loop.php for post-type 'homework'
  * v1.0
  */
?>
  
<h2><?php the_title(); ?></h2>

<?php include (TEMPLATEPATH . '/inc/sidenav.php' ); ?>

<?php 
  if ( get_post_meta($post->ID, 'due_date', true) ) : 
    echo '<p class="due-date">Due: ' . get_post_meta($post->ID, 'due_date', true) . '</p>';
  endif; ?>
  


<div id="innerWrapper"> 
  <em><?php the_excerpt(); ?></em> 

  <?php the_content(); ?>

  <?php edit_post_link('Edit this homework','','.'); ?>

</div> <!-- innerWrapper  -->
