<?php
return array(
	'_root_'  => 'contents/auth/',    // The default route
	'_404_'   => 'contents/auth/',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);