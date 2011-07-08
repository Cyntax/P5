<?php

	/* name:				page.php
	 * path:				/core/classes/input.php
	 * package:			P5 Framework
	 * Author(s):		Cyntax Technologies Development Team
	 * License:			Cyntax Open Technology License (http://code.cyntaxtech.com/licenses/cyntax-open-technology)
	 */

	class Page extends P5_Page {

		// overridden display method, adds webpage header and footer before and after content respectively
		// shows a simple usage of the Page::factory() method to load more than one page at a time and use them
		
		public function display() {
			
			$header = Page::factory( '/header' );
			echo $header->get_content();
			
			parent::display();

			$footer = Page::factory( '/footer' );
			echo $footer->get_content();
		}

	}

?>