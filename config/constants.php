<?php
/* 	
	All Frog Pond App Constants Definition
*/

// Database connection parameters
define("DB_SERVER_NAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE_NAME", "wakanow_frogs_db");

// App name
define("APP_NAME", "Frogy Pond");

// base url
$url = "http://" . $_SERVER['SERVER_NAME']."/frogpond";
define("BASE_URL", $url);

?>