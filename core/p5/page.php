<?php

	/* name:				page.php
	 * path:				/core/p5/page.php
	 * description:	Core WebPage class. Extremely simple way to include additional php files in the application
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */
	
	/* The Page class shows an example of how can you mix static and regular methods in a class
	 * and use them to achieve a particular functionality.
	 * This allows you to use the static methods, as well as create an object of the class
	 * and use its regular methods
	 */
	class P5_Page {

		// most beginners would write the following as ( var $folder; ) after copying from somewhere
		// keeping grip on the variable scope gives your class robustness, so make a habit of doing that everytime
		protected static $folder = 'core/pages';		// static variables are initialized only once!
		protected $is_valid;			// becomes true if the page gets loaded, false otherwise
		protected $file_path;		// the path from which the page is loaded
		protected $content;			// the actual data inside the file

		// a rather useful OOP technique, due to which you cannot use code like ( $page = new Page(); )
		// is to make the constructor private/protected.
		// it is done here as an example to force you to use the factory method :)
		protected function __construct() {
			// another simple mistake by beginners is to leave uninitialized variables in the application/classes
			// and spend late nights trying to find bugs and fix them with alternate techniques, creating more bugs :P
			$this->is_loaded = false;
			$this->file_path = '';
			$this->content = '';
		}
		
		function  __destruct() {
		}
		
		// use this function as many times as you want to create page objects
		public static function factory( $path ) {
			// let's try and find out if the path has invalid characters. This is a common mistake by developers
			// which allows inclusion of unwanted files and display them to the user, causing security holes
			// if the url is invalid, exception is thrown, which keeps our code in this function cleaner
			$path = self::validate_path( $path ); 
			
			$full_path = self::$folder . $path . '.php';
			if ( !file_exists( $full_path ) )
				return NULL;
			
			// the magic here is that the class can use it's own constructor, while external code cannot!
			$page = new Page();
			
			// leave the task of loading the content to the object itself 
			$page->load_file( $full_path );
			
			// return our brand new shiny object to the caller proudly
			return $page;
		}
		
		// a protected method that is only required by the page class, to check for invalid paths on the file system
		protected static function validate_path( $path ) {
			
			// we use the most simplest technique here to disable access to files outside our page folder
			// you are encouraged to find and improve this function by adding more security
			if ( strpos( $path, '..' ) !== FALSE )
				throw new Exception( 'Invalid filepath: ' . $path );
			
			$path = '/' . trim( $path, ' /' );
			
			// if the home page is accessed, the url is empty, so we return the index page url
			if ( $path == '/' )
				return '/index';
			
			return $path;
		}
		
		// note here that this function is not called until the path is verified and it exists
		// which is why the function does not return true or false
		protected function load_file( $full_path ) {
			
			// ob_start is a multilevel buffering function (see the php manual for more info)
			ob_start();
			
			include( $full_path );
			
			$this->content = ob_get_clean();
			
			$this->is_loaded= true;
			$this->file_path = $full_path;
		}
		
		public function is_loaded() {
			return $this->is_loaded;
		}
		
		public function get_content() {
			return $this->content;
		}
		
		// this function is rather simple, as it only prints the content of the page which is loaded inside it
		public function display() {
			echo $this->content;
		}
		
	}

?>