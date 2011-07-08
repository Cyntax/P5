<?php

	/* name:				input.php
	 * path:				/core/p5/input.php
	 * description:	Core input management class that provides useful functions related to user input
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */

	class P5_Input {

		function __construct() {
		}
		
		function __destruct() {
		}

		// safe wrapper to get variables from user input (get array)
		public function get( $key, $default ) {
			return isset( $_GET[$key] ) ? $_GET[$key] : $default;
		}
		
		// safe wrapper to get variables from user input (post array)
		public function post( $key, $default ) {
			return isset( $_POST[$key] ) ? $_POST[$key] : $default;
		}

	}

?>