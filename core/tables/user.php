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
	
	public function adddUser($userInfo){
		$username = $this->filterString($userInfo["username"]);
		$email = $this->filterString($userInfo["email"]);
		$department = $this->filterString($userInfo["department"]);
		$password = $this->filterString($userInfo["password"]);
		$subject = $this->filterString($userInfo["subject"]);
		$gender = intval($userInfo["gender"]);
		$birthday = $userInfo["birthday"];
		$identity = $this->filterString($userInfo["identity"]);
		$tel = $this->filterString($userInfo["tel"]);
		$phone = $this->filterString($userInfo["phone"]);
		$nation = $this->filterString($userInfo["nation"]);
		$degree = intval($userInfo["degree"]);
		$titles = intval($userInfo["titles"]);
		$position = $this->filterString($userInfo["position"]);
		$description = $userInfo["description"];
		
		$birthday = explode("-", $birthday);
		$year = $birthday[0];
		$month = $birthday[1];
		$day = $birthday[2];
		$birthday = mktime(null,null,null,$month, $day, $year);
		
		$password = md5($password);
		$createTime = time();
		
		$sql = "insert into {$this->tableName} values(
			'{$username}',
			'{$email}',
			'{$password}',
			{$gender},
			'{$description}',
			'',
			{$createTime},
			
		)";
	}
	
	public function filterString($str){
		$str = trim($str);
		return stripcslashes($str);
	}
}