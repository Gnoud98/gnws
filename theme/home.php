<?php

/**
Template Name: Trang chủ
 */

get_header();
?>
<main>
	<?php
	if ( have_rows( 'home_components' ) )
	{
		while ( have_rows( 'home_components' ) ) :
			the_row();
			$module_name = get_row_layout();
			switch ( $module_name ) :
				case $module_name:
					get_template_part( 'components/' . $module_name );
			endswitch;
		endwhile;
	}
	?>
	<h1 class="d-none">
		<?php echo wp_title() ?>
	</h1>

</main>

<?php
get_footer();