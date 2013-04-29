<?php
require_once 'global.php';
require_once TABLE_ROOT."user.php";

if(!empty($_POST)) {
	$GLOBALS["userinfo"] = $_POST;
}
