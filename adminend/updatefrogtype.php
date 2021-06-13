<?php
include_once("../frogy/frogyclass.php"); 
// validate inputs
$errors = array();
if (empty($_POST['frogtypename'])) {
	$errors['frogtypename'] = "Frog type name is required!";
}

if (empty($_POST['description'])) {
	$errors['description'] = "Description is required!";
}


if (!empty($errors)) {
	echo json_encode($errors);
}else{
	
	// create FrogType class object 
	$obj = new FrogType;

	// sanitize inputs
	$frogtypename = $obj->sanitizeInput($_POST['frogtypename']);
	$description = $obj->sanitizeInput($_POST['description']);
	$frogtypeid = $_POST['frogtypeid'];
	$frogimage = $_POST['frogimage'];

	// reference updateFrogType method
	$output = $obj->updateFrogType($frogtypeid, $frogtypename, $description, $frogimage);

	echo json_encode($output);
}

?>