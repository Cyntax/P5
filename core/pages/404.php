<?php
	// since the page is actually not available, we must send 404 headers
	// this keeps the browser and other clients aware that this page is actually
	// not real. You can move these two lines to your index.php if you like
	$protocol = App::server('SERVER_PROTOCOL', 'HTTP/1.1');
	Output::header($protocol . ' 404 Page not found!');
?>
<h1>Oh oh!</h1>

<p>
We are sorry, but you accessed a url that does not exist.
</p>