<?php
// Fold configuration
define("APP_PATH", dirname(dirname(__FILE__))."/");
define("CORE_PATH", APP_PATH."core/");
define("TABLE_ROOT", CORE_PATH."tables/");

define("SITE", "http://www.teacher.com/");
define("IMAGE_ROOT", SITE."image/");
define("STYLE_ROOT", SITE."style/");
define("SCRIPT_ROOT", SITE."script/");

# show the error line
define("ERROR_SHOW_LINE", 5);


// Database configuration
$database["host"] = "localhost";
$database["user"] = "root";
$database["password"] = "";
$database["dbname"] = "teacher_study_system";
$database["pre"] = "tss_";
$GLOBALS["database"] = $database;

// Develop configuration
define("DEBUG", true);

// Error reporting
if (DEBUG) {
	if( substr(PHP_VERSION, 0, 3) == "5.3" ){
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
	}else{
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	}
} else {
	error_reporting(0);
}

// Load the core program
require_once(CORE_PATH."function.php");

// Load database core
require_once(CORE_PATH."mysql.php");

// Start session
session_start();
