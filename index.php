<?php

	/* name:				index.php
	 * path:				/index.php
	 * description:	application entry point for the P5 framework
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */

	// this is one of the only two require calls you will see in the whole application 
	require( 'core/classes/app.php' );
	
	// initialize the application class (modify the class method to suit your needs)
	App::init();
	
	// find out the relative url that is requested from index.php ( e.g. /, /about/ etc. )
	$URL = App::current_url();
	
	try {
		// create a new webpage object using the Page class factory method for this url
		// the factory method allows creating more than one pages at a time (if required)
		$PAGE = Page::factory( $URL );
		
		// if the requested page does not exist, instead of breaking up, just show a nice 404 page.
		// remember that the url is a valid one, but we just don't have implemented it!
		if ( $PAGE === NULL || !$PAGE->is_loaded() ) {
			Log::info( 'Page 404: ' . $URL );
			$PAGE = Page::factory( '404' );
		}
	} catch( Exception $e ) {
		// access to a url with illegal characters
		// let's load a simple page to show another kind of error to the user
		Log::error( 'invalid url accessed: ' . $URL );
		$PAGE = Page::factory( 'invalid' );
	}
	
	// display the page contents
	$PAGE->display();
	
	// unload resources if required (you can modify the cleanup method in your application class)
	App::cleanup();
	
?>