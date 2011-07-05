<?php

	/* name:				output.php
	 * path:				/core/p5/output.php
	 * description:	Core output management class. Can be used for setting up proper caching/compression of the output
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */
	
	class P5_Output {

		function __construct() {
		}
		
		function __destruct() {
		}
		
		public static function errors( $enable = TRUE ) {
			ini_set( 'display_errors', $enable ? 'on' : 'off' );
		}
		
		public static function buffer( $enable = TRUE ) {
			if ( $enable )
				ob_start();
			else
				ob_implicit_flush( TRUE );
		}
		
		public static function compress( $enable = TRUE ) {
		}
		
		public static function header( $name, $value ) {
			header( $name . ': '. $value );
		}
		
		public static function flush() {
			ob_end_flush();
		}
		
	}

?>