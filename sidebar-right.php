<aside id="sidebar-right" class="sidebar">

	<?php  if ( is_active_sidebar( 'right' ) ) : ?>

		<?php dynamic_sidebar( 'right' ); ?>

	<?php else : ?>

		<?php //Create some custom HTML or call the_widget().  It's up to you. ?>

	<?php endif; ?>
	
</aside>
