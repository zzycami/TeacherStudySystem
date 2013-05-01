<?php
require_once 'global.php';
require_once TABLE_ROOT."department.php";

$dbDepartment = new Db_Table_Department();
if(!empty($_POST)) {
	$department = $_POST;
	$dbDepartment->addDepartment($department);
}


$departmentList = $dbDepartment->getDepartmentList();
foreach ($departmentList as $key => &$value) {
	$value["num"] = $dbDepartment->getTeacherNumber($value["id"]);
}
$GLOBALS["department_list"] = $departmentList;