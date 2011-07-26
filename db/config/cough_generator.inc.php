<?php
/**
 * Lightweight config example that only customizes the output path
 **/

$generated = dirname(dirname(__FILE__)) . '/models/';

$config = array(
	'paths' => array(
		'generated_classes' => $generated . 'generated/',
		'starter_classes' => $generated . 'concrete/',
		'file_suffix' => '.class.php',
	),
);

?>