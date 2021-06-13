<?php
include_once("../frogy/frogyclass.php"); 
// validate inputs
$errors = array();
if (empty($_POST['pondname'])) {
	$errors['pondname'] = "Pond name is required!";
}
if (empty($_POST['frogtype'])) {
	$errors['frogtype'] = "Frog type is required!";
}

if (empty($_POST['frogname'])) {
	$errors['frogname'] = "Frog name is required!";
}

if (empty($_POST['frogage'])) {
	$errors['frogage'] = "Frog age is required!";
}

if (empty($_POST['color'])) {
	$errors['color'] = "Color is required!";
}

if (empty($_POST['weight'])) {
	$errors['weight'] = "Weight is required!";
}

if (empty($_POST['status'])) {
	$errors['status'] = "Status is required!";
}

if (!empty($errors)) {
	echo json_encode($errors);
}else{
	// sanitize inputs
	$obj = new Auth;
	$pondname = $obj->sanitizeInput($_POST['pondname']);
	$frogtype = $obj->sanitizeInput($_POST['frogtype']);
	$frogname = $obj->sanitizeInput($_POST['frogname']);
	$frogage = $obj->sanitizeInput($_POST['frogage']);
	$color = $obj->sanitizeInput($_POST['color']);
	$weight = $obj->sanitizeInput($_POST['weight']);
	$gender = $obj->sanitizeInput($_POST['gender']);
	$description = $obj->sanitizeInput($_POST['description']);
	$status = $obj->sanitizeInput($_POST['status']);
	$addedby = $_POST['userid'];

	// create frog object 
	$frogobj = new Frog;
	$output = $frogobj->insertFrog($frogname, $pondname, $frogtype, $gender, $frogage, $color, $weight, $description, $status, $addedby);

	echo json_encode($output);
}

?>