<?php
/*
	Program: All frogs pond app classes
	Date: 12/June/2021
	Author: Akinbamido Yemi Sunday
*/

// include the config/constants file
include_once("../config/constants.php"); 

// Database connection class
class DatabaseConfig{
	// member variables
	public $dbcon; // database connection handler


	// member function
	public function __construct(){
		// create connection by instantiating MySQLi class
		$this->dbcon = new Mysqli(DB_SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

		if ($this->dbcon->connect_error) {
			die("Connection Failed: ".$this->dbcon->connect_error);
		}
	}

}


// Pond class definition
class Pond{
	// member variables
	public $pond_name;
	public $pond_desc;
	public $pond_image;
	public $pond_status;
	public $dbobj; // database object handler


	// member functions
	public function __construct(){
		// create instance of DatabaseConfig class
		$this->dbobj = new DatabaseConfig;
	}

	// public function createPond($name, $desc, $status){

	// }

}





?>