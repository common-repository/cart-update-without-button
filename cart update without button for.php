<?php
/*
Plugin Name:       cart update without button 
Plugin URI:        https://devles.com
Description:       cart quantity calculate without button on woocommerce. 
Version:           1.0
Requires at least: 5.2
Requires PHP:      7.2
Author:            Rezwan Shiblu
Author URI:        http://devles.com
License:           GPL v2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain:       rzcarts
*/

 function wct_hook_css() {

    ?>
        <style>
            .woocommerce button[name="update_cart"],
            .woocommerce input[name="update_cart"] {
	            display: none;
            }
        </style>
    <?php
}

add_action('wp_head', 'wct_hook_css');

function wct_hook_javascript() {

    ?>
        <script>
            var timeout;
 
			jQuery( function( $ ) {
				$('.woocommerce').on('change', 'input.qty', function(){
			 
					if ( timeout !== undefined ) {
						clearTimeout( timeout );
					}
			 
					timeout = setTimeout(function() {
						$("[name='update_cart']").trigger("click");
					}, 1000 ); // 1 second delay, half a second (500) seems comfortable too
			 
				});
			} );

        </script>
    <?php
}

add_action('wp_head', 'wct_hook_javascript');