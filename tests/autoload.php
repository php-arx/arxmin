<?php

/**
 * Handle Autoload method to handle travis and classic method
 */

if ( is_file( __DIR__ . '/../../../../vendor/autoload.php' ) ) {
	require_once __DIR__ . '/../../../../vendor/autoload.php';
} else {
	require_once __DIR__ . '../vendor/autoload.php';
}

if(!function_exists('dc')){

	/**
	 * Little Debug helper
	 */
	function dc(){



		$bt = debug_backtrace();
		$caller = array_shift($bt);

		echo "\n@".$caller['file']." line  ".$caller['line']."\n";

		var_dump( func_get_args() );


		echo "\n@END".$caller['file']." line  ".$caller['line']."\n";
	}

}