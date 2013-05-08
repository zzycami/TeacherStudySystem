<?php
require_once '../global.php';
require_once TABLE_ROOT."department.php";

if(!empty($_POST)){
	$id = $_POST["id"];

	$dbDepartment = new Db_Table_Department();
	$department = $dbDepartment->getDepartmentById($id);
	echo json_encode($department);
}