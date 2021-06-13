<?php
/*
	Program: All frogs pond app classes
	Date: 12/June/2021
	Author: Akinbamido Yemi Sunday
*/

// include the config/constants file
include_once("../config/constants.php"); 

// include traits
include_once("frogytraits.php"); 

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

// Auth class definition
class Auth{
	// traits
	use FrogyCommon;
	// member variables
	public $dbobj; // database object handler

	// member functions
	public function __construct(){
		// create instance of DatabaseConfig class
		$this->dbobj = new DatabaseConfig;
	}


	public function register($lastname, $firstname, $emailaddress, $password){

		// hash password
		$pswd = md5($password);

		// write sql query
		$sql = "INSERT INTO users(lastname, firstname, emailaddress, password) VALUES('$lastname', '$firstname', '$emailaddress', '$pswd')";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->error) {
			$output['error'] = "Oops! Could not create account ".$this->dbobj->dbcon->error;
		}else{			
			$output['success'] = $this->dbobj->dbcon->insert_id;
		}

		return $output;

	}

	public function login($emailaddress, $password){
		// hash password
		$pswd = md5($password);

		// write sql query
		$sql = "SELECT users.*, roles.role_name FROM users 
		LEFT JOIN roles on roles.role_id = users.role_id
		WHERE emailaddress = '$emailaddress' AND password = '$pswd' LIMIT 1";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_assoc(); // get user details

		$output = array();
		if ($this->dbobj->dbcon->affected_rows == 1) {
			// set session variables
			session_start();
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_lastname'] = $row['lastname'];
			$_SESSION['user_firstname'] = $row['firstname'];
			$_SESSION['user_rolename'] = $row['role_name'];
			$_SESSION['user_email'] = $emailaddress;
			$_SESSION['frogy_wakanow'] = "wonakaw";

			$output['success'] = "successfully login";
		}else{
			$output['error'] = "Oops! Invalid username or password";
		}

		return $output;
	}

	public function getUserDetails($userid){
		// write sql query
		$sql = "SELECT users.*, roles.role_name FROM users 
		LEFT JOIN roles on roles.role_id = users.role_id
		WHERE users.user_id = '$userid' LIMIT 1";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_assoc(); // get pond details

		return $row;

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
	

	public function getPonds(){
		// write sql query
		$sql = "SELECT * FROM ponds WHERE pond_status!='Deleted' ORDER BY pond_id DESC";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_all(MYSQLI_ASSOC); // get all ponds

		return $row;

	}

	public function getActivePonds(){
		// write sql query
		$sql = "SELECT * FROM ponds WHERE pond_status='Active' ORDER BY pond_name ASC";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_all(MYSQLI_ASSOC); // get all ponds

		return $row;

	}

	public function createPond($name, $desc, $status){
		// write sql query
		$sql = "INSERT INTO ponds(pond_name, pond_desc, pond_status) VALUES('$name', '$desc', '$status')";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->error) {
			$output['error'] = "Oops! Could not create pond ".$this->dbobj->dbcon->error;;
		}else{
			$output['success'] = "Pond was successfully created";
		}

		return $output;
	}

	public function getPondDetails($pondid){
		// write sql query
		$sql = "SELECT * FROM ponds WHERE pond_id='$pondid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_assoc(); // get pond details

		return $row;

	}

	public function updatePond($pondid, $name, $desc, $status){
		// write sql query
		$sql = "UPDATE ponds SET pond_name='$name', pond_desc='$desc', pond_status='$status' WHERE pond_id='$pondid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->affected_rows == 1) {
			$output['success'] = "Pond was successfully updated";
		}elseif($this->dbobj->dbcon->affected_rows != 1 && $this->dbobj->dbcon->error){
			$output['error'] = "Oops! Could not update pond ".$this->dbobj->dbcon->error;
		}else{
			$output['error'] = "Oops! No any changes made.";
		}

		return $output;
	}


	public function deletePond($pondid){
		// write sql query
		$sql = "UPDATE ponds SET pond_status='Deleted' WHERE pond_id='$pondid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->affected_rows == 1) {
			$output = "Pond was successfully deleted";
		}elseif($this->dbobj->dbcon->affected_rows != 1 && $this->dbobj->dbcon->error){
			$output = "Oops! Could not delete pond ".$this->dbobj->dbcon->error;
		}else{
			$output = "Oops! No any changes made.";
		}

		return $output;
	}

}


// FrogType class definition
class FrogType{
	// traits
	use FrogyCommon;

	// member variables	
	public $dbobj; // database object handler


	// member functions
	public function __construct(){
		// create instance of DatabaseConfig class
		$this->dbobj = new DatabaseConfig;
	}
	

	public function getFrogTypes(){
		// write sql query
		$sql = "SELECT * FROM frogtypes ORDER BY frogtype_name ASC";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_all(MYSQLI_ASSOC); // get all frog types

		return $row;

	}

	public function insertFrogType($name, $desc){

		$frogimage = "";

		// check if global variable $_FILES has a value
		if($_FILES['frogimage']['error']== 0){
			$frogimage = $this->uploadFile();
			if (is_array($frogimage)) {
				// error
				return $frogimage;
			}
		}

		// write sql query
		$sql = "INSERT INTO frogtypes(frogtype_name, frogtype_desc, frogtype_image) VALUES('$name', '$desc', '$frogimage')";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->error) {
			$output['error'] = "Oops! Could not add Frog Type ".$this->dbobj->dbcon->error;;
		}else{
			$output['success'] = "Frog Type was successfully added";
		}

		return $output;
	}

	public function getFrogTypeDetails($frogtypeid){
		// write sql query
		$sql = "SELECT * FROM frogtypes WHERE frogtype_id='$frogtypeid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_assoc(); // get frogtype details

		return $row;

	}

	public function updateFrogType($frogtypeid, $name, $desc, $frogimage){		

		// check if global variable $_FILES has a value
		if($_FILES['frogimage']['error']== 0){
			$frogimage = $this->uploadFile();
			if (is_array($frogimage)) {
				// error
				return $frogimage;
			}
		}

		// write sql query
		$sql = "UPDATE frogtypes SET frogtype_name='$name', frogtype_desc='$desc', frogtype_image='$frogimage' WHERE frogtype_id='$frogtypeid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->affected_rows == 1) {
			$output['success'] = "Frog Type details was successfully updated";
			
		}elseif($this->dbobj->dbcon->affected_rows != 1 && $this->dbobj->dbcon->error){
			$output['error'] = "Oops! Could not update Frog Type details ".$this->dbobj->dbcon->error;
		}else{
			$output = "Oops! No any changes made to frog type details.";
		}

		return $output;
	}


}


// Frog class definition
class Frog{
	// traits
	use FrogyCommon;
	
	// member variables	
	public $dbobj; // database object handler


	// member functions
	public function __construct(){
		// create instance of DatabaseConfig class
		$this->dbobj = new DatabaseConfig;
	}
	

	public function getFrogs(){
		// write sql query
		$sql = "SELECT frogs.*, ponds.pond_name, frogtypes.frogtype_name FROM frogs 
		LEFT JOIN ponds ON ponds.pond_id=frogs.pond_id
		LEFT JOIN frogtypes ON frogtypes.frogtype_id = frogs.frogtype_id
		WHERE status!='Dead'
		ORDER BY frog_id DESC";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_all(MYSQLI_ASSOC); // get all frogs

		return $row;

	}


	public function getDeadFrogs(){
		// write sql query
		$sql = "SELECT frogs.*, ponds.pond_name, frogtypes.frogtype_name FROM frogs 
		LEFT JOIN ponds ON ponds.pond_id=frogs.pond_id
		LEFT JOIN frogtypes ON frogtypes.frogtype_id = frogs.frogtype_id
		WHERE status='Dead'
		ORDER BY frog_id DESC";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_all(MYSQLI_ASSOC); // get all frogs

		return $row;

	}

	public function insertFrog($name, $pondid, $frogtypeid, $gender, $age, $color, $weight, $desc, $status, $addedby){

		$frogimage = "";

		// check if global variable $_FILES has a value
		if($_FILES['frogimage']['error']== 0){
			$frogimage = $this->uploadFile();
			if (is_array($frogimage)) {
				// error
				return $frogimage;
			}
		}

		// write sql query
		$sql = "INSERT INTO frogs(frog_name, pond_id, frogtype_id, gender, age, color, weight, description, status, frog_image, added_by) VALUES('$name', '$pondid', '$frogtypeid', '$gender', '$age', '$color', '$weight', '$desc', '$status', '$frogimage', '$addedby')";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->error) {
			$output['error'] = "Oops! Could not add Frog ".$this->dbobj->dbcon->error;;
		}else{
			$output['success'] = "Frog was successfully added";
		}

		return $output;
	}



	public function getFrogDetails($frogid){
		// write sql query
		$sql = "SELECT * FROM frogs WHERE frog_id='$frogid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);
		$row = $result->fetch_assoc(); // get pond details

		return $row;

	}


	public function updateFrog($frogid, $name, $pondid, $frogtypeid, $gender, $age, $color, $weight, $desc, $status, $addedby, $frogimage){		

		// check if global variable $_FILES has a value
		if($_FILES['frogimage']['error']== 0){
			$frogimage = $this->uploadFile();
			if (is_array($frogimage)) {
				// error
				return $frogimage;
			}
		}

		// write sql query
		$sql = "UPDATE frogs SET frog_name='$name', pond_id='$pondid', frogtype_id='$frogtypeid', gender='$gender', age='$age', color='$color', weight='$weight', description='$desc', status='$status', frog_image='$frogimage', added_by='$addedby' WHERE frog_id='$frogid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->affected_rows == 1) {
			$output['success'] = "Frog details was successfully updated";
			
		}elseif($this->dbobj->dbcon->affected_rows != 1 && $this->dbobj->dbcon->error){
			$output['error'] = "Oops! Could not update Frog details ".$this->dbobj->dbcon->error;
		}else{
			$output = "Oops! No any changes made to frog details.";
		}

		return $output;
	}


	public function deleteFrog($frogid){
		// write sql query
		$sql = "UPDATE frogs SET status='Dead' WHERE frog_id='$frogid'";

		// run the query
		$result = $this->dbobj->dbcon->query($sql);

		$output = array();
		if ($this->dbobj->dbcon->affected_rows == 1) {
			$output = "Frog was successfully deleted";
		}elseif($this->dbobj->dbcon->affected_rows != 1 && $this->dbobj->dbcon->error){
			$output = "Oops! Could not delete frog ".$this->dbobj->dbcon->error;
		}else{
			$output = "Oops! No any changes made.";
		}

		return $output;
	}


}





?>