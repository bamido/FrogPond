<?php
include_once("../frogy/frogyclass.php"); 
// validate inputs
$errors = array();
if (empty($_POST['pondname'])) {
	$errors['pondname'] = "Pond name is required!";
}
if (empty($_POST['description'])) {
	$errors['descriptionx'] = "Pond description is required!";
}

if (empty($_POST['status'])) {
	$errors['status'] = "Pond status is required!";
}

if (!empty($errors)) {
	echo json_encode($errors);
}else{
	// sanitize inputs
	$obj = new Auth;
	$pondname = $obj->sanitizeInput($_POST['pondname']);
	$description = $obj->sanitizeInput($_POST['description']);
	$status = $obj->sanitizeInput($_POST['status']);

	// pond instance
	$pondobj = new Pond;
	$output = $pondobj->createPond($pondname, $description, $status);

	echo json_encode($output);
}

?>