<?php

	/* name:				log.php
	 * path:				/core/p5/log.php
	 * description:	Core log class.
	 *						Remember folks, A good application must always log important information, and not only errors
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */
	
	
	class P5_Log {

		const ERROR = 1;
		const INFO = 2;
		const DEBUG = 4;

		protected static $log_level;

		function __construct() {
			self::$log_level = 0;
		}
		
		function __destruct() {
		}
		
		// you cna override this method in your Log class and perhaps write the log to a different directory
		protected static function add( $message ) {
			error_log( $message );
		}
		
		public static function init( $level = Log::ERROR ) {
			self::$log_level = $level;
			Log::debug( 'Log class initialized' );
		}
		
		public static function error( $message ) {
			if ( self::$log_level & self::ERROR )
				self::add( 'error: ' . $message );
		}
		
		public static function info( $message ) {
			if ( self::$log_level & self::INFO )
				self::add( 'info: ' . $message );
		}
		
		public static function debug( $message ) {
			if ( self::$log_level & self::DEBUG )
				self::add( 'debug: ' . $message );
		}
		
	}

?>