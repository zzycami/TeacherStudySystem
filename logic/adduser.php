<?php
require_once 'global.php';
require_once TABLE_ROOT."department.php";
require_once TABLE_ROOT."user.php";
require_once TABLE_ROOT."subject.php";

if(!empty($_POST)) {
	$GLOBALS["userinfo"] = $_POST;
	$dbUser = new Db_Table_User();
	$dbUser->addUser($GLOBALS["userinfo"]);
}


# ready department and subject data
$dbDepartment = new Db_Table_Department();
$departmentList = $dbDepartment->getDepartmentList();
$GLOBALS["departmentList"] = $departmentList;

$dbSubject = new Db_Table_Subject();
$subjectList = $dbSubject->getSubjectList();
$GLOBALS["subjectList"] =  $subjectList;
