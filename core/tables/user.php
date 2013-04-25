<?php
require_once(CORE_PATH."config.php");

class Db_Table_User extends Mysql{
	private $tableName = "user";
	
	public function __construct(){
		if(empty($GLOBALS["database"])){
			error("缺少数据库配置");
		}
		$this->tableName = $GLOBALS["database"]["pre"].$this->tableName;
		parent::__construct($GLOBALS["database"]);
	}
	
	public function __destruct(){
		parent::__destruct();
	}
	
	public function getUserByEmail($email){
		$sql = "select * from {$this->tableName} where email = '{$email}'";
		return $this->fetchAll($sql);
	}
}