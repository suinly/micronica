<?php
/**
 * Global functions
 */


/**
 * Debug function
 */
function debug($data = null) {
	echo '<strong>' . __FILE__ . '</strong>';
	echo '<pre class="debug">';
	print_r($data);
	echo '</pre>';
}
