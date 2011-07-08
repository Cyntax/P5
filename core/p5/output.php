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

		// enable / disable display of errors on screen		
		public static function errors( $enable = TRUE ) {
			ini_set( 'display_errors', $enable ? 'on' : 'off' );
		}

		// if you don't know about buffering yet, now is a good time to find out		
		public static function buffer( $enable = TRUE ) {
			if ( $enable )
				ob_start();
			else
				ob_implicit_flush( TRUE );
		}
		
		// left as an exercise for you to add code to this function (if you need to use it, that is)
		public static function compress( $enable = TRUE ) {
		}
		
		public static function header( $name, $value = NULL ) {
			// if value is NULL, it means the first parameter is the complete header definition
			// otherwise, we will concat the name and value to create the header definition
			header( $value === NULL ? $name : ($name . ': '. $value) );
		}

		// flush the output buffer		
		public static function flush() {
			ob_end_flush();
		}
		
	}

?>