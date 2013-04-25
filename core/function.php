<?php
/**
 * @category core program
 * @uses define the function used frequently
 * @author Zhu.Guohui
 * @copyright www.hdu.edu.cn
 */

function redirect($url){
	header("Location:".$url);
	die;
}

function debug($var,$method=1,$exit=0){
	echo '<pre>';
	$method?print_r($var):var_dump($var);
	echo '</pre>';
	if($exit) exit;
}


function error($msg, $stop=true){
	if(DEBUG != true){
		// If the web is used, write the error to the error log file
		error_log($msg);
		if($stop == true){
			exit();
		}
	}else {
		$bufferabove = ob_get_clean();
		$traces = debug_backtrace();
		require_once(CORE_PATH.'error.php');
		if(TRUE == $stop)exit;
	}
}