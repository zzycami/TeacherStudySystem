<?php
/**
 * Logic login
 * @copyright www.hdu.edu.cn
 * @author Zhu.Guohui
 * @uses used to deal user logout
 */
require_once '../global.php';
require_once TABLE_ROOT."user.php";

unset($_SESSION["user_login"]);
redirect($_SERVER["HTTP_REFERER"]);