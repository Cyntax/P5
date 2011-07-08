<?php

	/* name:				app.php
	 * path:				/core/classes/app.php
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */
	
	// use require since without the core class inclusion, our class definition will surely fail
	require ( 'core/p5/p5.php' );
	
	// Core application base class
	class App extends P5 {

		function __construct() {
		}
		
		function __destruct() {
		}
		
		// overridden init function - include your own initialization
		public static function init() {
			parent::init();
			
			// let's buffer the php output!
			Output::buffer( true );
			
			// enable/disable display of errors on the screen
			Output::errors( FALSE );
	
			// initialize the log class. If not initialized, nothing will be logged
			// we enable all errors to see how the log file fills up :)
			// also see your php.ini file config directives for 'error_log' and 'log_errors'
			Log::init( Log::ERROR | Log::INFO | Log::DEBUG );
		}
		
		public static function cleanup() {
			// flush output buffer since we enabled buffering at startup
			Output::flush();
		}
		
	}

?>