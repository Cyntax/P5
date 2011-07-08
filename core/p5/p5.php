<?php

	/* name:				p5.php
	 * path:				/core/p5/p5.php
	 * description:	Core P5 application class. Provides base functionality for the main application
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */
	
	class P5 {

		// try to keep all initialization in the init() method, as the class has static methods only
		function __construct() {
		}
		
		function  __destruct() {
		}
		
		public static function init() {
			// tell php to use a static function for autoloading classes
			// we use App class here, so that you can override the autoloading function
			// in your App class implementaion without changing this core class
			spl_autoload_register( 'App::_loader' ); 
			
			// tell php to call one of our function at the very end of execution
			register_shutdown_function( 'App::_exit' );
		}
		
		// you can close database connections in this function etc. 
		public static function cleanup() {
		}
		
		// the following function should never be directly called from your code
		// the underscore at the beginning of function 'emphasizes' this logic
		protected static function _loader( $class_name ) {
			// the following is a simple (though a bit crude ) logic to find class files
			// you are encouraged to override and improve this function in your 'App' class
			$underscore = strpos( $class_name, '_' );
			if ( $underscore !== FALSE ) {
				$parts = explode( '_', $class_name );
		
				// use an anonymous function to convert all values in the array to lower case
				array_walk( $parts, function( &$item, $key ) {
						$item = strtolower( $item );
					}
				);
				
				// re-join the parts to get the actual file path
				$file_path = implode( '/', $parts );
				
				include( 'core/'. $file_path . '.php' );
			} else
				include ( 'core/classes/' . strtolower( $class_name ) . '.php' );
		}

		// function called at the very end of the execution of the webpage		
		public static function _exit() {
			Log::debug('Execution complete');
		}
		
		public static function current_url() {
			// a common mistake by beginners is to simply return $_SERVER['PATH_INFO']
			// just remember if you know something is not guaranteed to be there,
			// you check whether it exists and then use it!
			return isset( $_SERVER['PATH_INFO'] ) ? $_SERVER['PATH_INFO'] : '/';
		}
		
		// utility function to get server variables (avoids isset checks in the application)
		public static function server( $variable, $default = '') {
			return isset( $_SERVER[$variable] ) ? $_SERVER[$variable] : $default;
		}
		
	}

?>