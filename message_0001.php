<?php
/**
* Plugin Name: Graphic Agenda December Announcement
* Plugin URI: http://www.graphicagenda.com
* Description: Let your admin bloggers know you've received payment in December 2010
* Version: 12.7.2010
*
* Author: Graphic Agenda
* Author URI: http://www.graphicagenda.com
*/

function message_0001(){
	$sendback = wp_get_referer();
	$sendback = add_query_arg('wpsc_notices' , 'dec_ignore' , $sendback);
?>
	<div id="message" class="updated fade">
		<p><?php printf( __( 'MESSAGE GOES HERE. Feel free to <a href="%2s">close this message</a>.', 'wpsc' ), 'mailto:your@email.com', $sendback ); ?></p>
	</div>



<?php
}
if( 1 != get_option('wpsc_ignore_0001_message'))
	add_action('admin_notices' , 'message_0001');


function wpsc_ignore_0001_message(){
	$sendback = wp_get_referer();
	$sendback = remove_query_arg('wpsc_notices', $sendback);
	update_option( 'wpsc_ignore_0001_message', 1 );
	wp_redirect( $sendback );


}
if ( isset( $_REQUEST['wpsc_notices'] ) && $_REQUEST['wpsc_notices'] == '0001_ignore' ) {
	add_action('init','wpsc_ignore_0001_message');
}
?>