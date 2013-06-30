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

/**
 * Password hasher
 */
function password($string = null) {
	if ($string != null) {
		return md5(md5($string) . Config::get('SECRET'));
	}
}

function inQuoutes($quote = "'", $str = null) {
	return $quote . $str . $quote;
}

function h($str) {
	return htmlspecialchars($str);
}
