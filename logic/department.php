<?php
require_once 'global.php';
require_once TABLE_ROOT."department.php";

// Get the action method
$action = $_GET["action"];


$dbDepartment = new Db_Table_Department();

if($action == "delete") {
	$departmentId = $_GET["id"];
	$dbDepartment->deleteDepartment($departmentId);
}else if($action == "add"){
	// add a new department
	if(!empty($_POST)) {
		$department = $_POST;
		$dbDepartment->addDepartment($department);
	}
}else if($action == "update"){
	if(!empty($_POST)) {
		$id = $_GET["id"];
		$department = $_POST;
		$department["id"] = $id;
		$dbDepartment->modifyDepartment($department);
	}
}


// Ready the display 
$departmentList = $dbDepartment->getDepartmentList();
foreach ($departmentList as $key => &$value) {
	$value["num"] = $dbDepartment->getTeacherNumber($value["id"]);
}
$GLOBALS["department_list"] = $departmentList;