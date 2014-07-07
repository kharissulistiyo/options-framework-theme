<?php

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}

/*
 * This is an example of filtering menu parameters
 */

/*
function prefix_options_menu_filter( $menu ) {
	$menu['mode'] = 'menu';
	$menu['page_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_slug'] = 'hello-options';
	return $menu;
}

add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );
*/


function nav_wrap_starts_custom(){

	echo '<h2 class="nav-tab-wrapper custom">';

}

add_filter('nav_tab_wrapper_starts', 'nav_wrap_starts_custom');


function nav_wrap_ends_custom(){

	echo '</h2>';

}

add_filter('nav_tab_wrapper_ends', 'nav_wrap_ends_custom');


/**
 * New actions :
	* options_form_header : class-options-framework-admin.php
	* options_form_footer : class-options-framework-admin.php
	* optionsframework_before : class-options-framework-admin.php
	* group_heading_content : class-options-interface.php

*/


function options_secondary_wrap_starts(){

	echo '<div id="secondary-wrap">';

}

add_action('optionsframework_before', 'options_secondary_wrap_starts');

function options_secondary_wrap_ends(){

	echo '</div><!-- /#secondary-wrap -->';

}

add_action('optionsframework_after', 'options_secondary_wrap_ends');


function options_reset_save_buttons(){ ?>

<div id="optionsframework-submit">
	<input type="submit" class="button-primary" name="update" value="<?php esc_attr_e( 'Save Options', 'textdomain' ); ?>" />
	<input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e( 'Restore Defaults', 'textdomain' ); ?>" onclick="return confirm( '<?php print esc_js( __( 'Click OK to reset. Any theme settings will be lost!', 'textdomain' ) ); ?>' );" />
	<div class="clear"></div>
</div>

<?php }

add_action('options_form_footer', 'options_reset_save_buttons');
