<?php

// Load in the Autoloader
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';


Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
Autoloader::register();




// saito add ----------------------------------------------------------
define('ROOT_DIR' , dirname (__FILE__).'/../..');

// 動作環境切り替え
define('ENVIRONMENT_DEVELOPMENT', 'development');
define('ENVIRONMENT_TESTING'    , 'testing');
define('ENVIRONMENT_PRODUCTION' , 'production');

//認証PF
define('FACEBOOK', 'facebook');
define('TWITTER' , 'twitter');


/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
if (file_exists(DOCROOT.'/../.dev') || file_exists(DOCROOT.'/.dev')) {
    Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::DEVELOPMENT);
    define('ENVIRONMENT', ENVIRONMENT_DEVELOPMENT);
} else if(file_exists(DOCROOT.'/.test') || file_exists(DOCROOT.'/public/.test')){
    Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::TEST);
    define('ENVIRONMENT', ENVIRONMENT_TESTING);
    
} else {
    Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::PRODUCTION);
    define('ENVIRONMENT', ENVIRONMENT_PRODUCTION);
}

// Initialize the framework with the config file.
Fuel::init('config.php');
