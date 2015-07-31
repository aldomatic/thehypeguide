<?php 


// add_filter( 'woocommerce_loop_add_to_cart_link', 'change_add_to_cart_loop' );
// function change_add_to_cart_loop( $product ) {
//     global $product;
//     return '<a href="'. esc_url( $product->get_permalink( $product->id ) ) . '">View Product</a>';
// }


add_action( 'admin_menu', 'sas_add_admin_menu' );
add_action( 'admin_init', 'sas_settings_init' );


function sas_add_admin_menu(  ) { 

	add_options_page( 'shareasale create links', 'shareasale create links', 'manage_options', 'shareasale_create_links', 'shareasale_create_links_options_page' );

}


function sas_settings_init(  ) { 

	register_setting( 'pluginPage', 'sas_settings' );

	add_settings_section(
		'sas_pluginPage_section', 
		__( 'Your section description', 'sas' ), 
		'sas_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'sas_text_field_0', 
		__( 'Settings field description', 'sas' ), 
		'sas_text_field_0_render', 
		'pluginPage', 
		'sas_pluginPage_section' 
	);

	add_settings_field( 
		'sas_select_field_1', 
		__( 'Settings field description', 'sas' ), 
		'sas_select_field_1_render', 
		'pluginPage', 
		'sas_pluginPage_section' 
	);


}


function sas_text_field_0_render(  ) { 

	$options = get_option( 'sas_settings' );
	?>
	<input type='text' name='sas_settings[sas_text_field_0]' value='<?php echo $options['sas_text_field_0']; ?>'>
	<?php

}


function sas_select_field_1_render(  ) { 

	$options = get_option( 'sas_settings' );
	?>
	<select name='sas_settings[sas_select_field_1]'>
		<option value='1' <?php selected( $options['sas_select_field_1'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['sas_select_field_1'], 2 ); ?>>Option 2</option>
	</select>

<?php

}


function sas_settings_section_callback(  ) { 

	echo __( 'This section description', 'sas' );

}


function sas_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>shareasale create links</h2>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}

?>


