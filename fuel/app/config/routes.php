<?php
return array(
	'_root_'  => 'contents/top/',    // The default route
	'_404_'   => 'contents/top/',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);