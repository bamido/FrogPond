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
	// sanitize inputs
	$obj = new Auth;
	$frogtypename = $obj->sanitizeInput($_POST['frogtypename']);
	$description = $obj->sanitizeInput($_POST['description']);

	// create FrogType class object 
	$frogtypeobj = new FrogType;
	$output = $frogtypeobj->insertFrogType($frogtypename, $description);

	echo json_encode($output);
}

?>