<?php

define('REAL_PATH', realpath(dirname(__FILE__)));

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', REAL_PATH . '/application');
   
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(REAL_PATH . '/library'),
    get_include_path()
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

function basePath()
{
      return rtrim( Zend_Controller_Front::getInstance()->getBaseUrl(), '/' );
}

date_default_timezone_set( 'America/Fortaleza' );

try {
	$application->bootstrap()->run();
} catch (Exception $exception) {

?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"; "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Zend Framework Default Application</title>
	</head>
	<body>
	<h1>An error occurred </h1>
	<h3>Exception information:</h3>
	<p>
	<b>Message:</b> <?php echo $exception->getMessage(); ?>
	</p>
	
	<h3>Stack trace:</h3>
	<pre><?php echo $exception->getTraceAsString(); ?></pre>
	</body>
	</html>
<?php
}
