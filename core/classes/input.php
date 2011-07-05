<?php

	/* name:				input.php
	 * path:				/core/classes/input.php
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */

	class P5_Input {

		function __construct()
		{
		}
		
		function  __destruct()
		{
		}
		
		public function get( $key, $default ) {
			return isset( $_GET[$key] ) ? $_GET[$key] : $default;
		}
		
		public function post( $key, $default ) {
			return isset( $_POST[$key] ) ? $_POST[$key] : $default;
		}
		
	}

?>