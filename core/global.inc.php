<?php
/**
 * Global functions
 */


/**
 * Debug function
 */
function debug($data = null) {
	echo '<pre class="debug">';
	print_r($data);
	echo '</pre>';
}
