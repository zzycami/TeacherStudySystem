<?php
require_once(CORE_PATH."config.php");

class Db_Table_Department extends Mysql{
	private $tableName = "department";
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

	public function addDepartment($department){
		$title = $this->filterString($department["title"]);
		$description = $this->filterString($department["description"]);
		$sql = "insert into {$this->tableName}(title, description) values('{$title}', '$description')";
		return $this->query($sql);
	}

	public function deleteDepartment($id){
		$id = intval($id);
		$sql = "delete from {$this->tableName} where id={$id}";
		return $this->query($sql);
	}

	public function getDepartmentList(){
		$sql = "select * from {$this->tableName}";
		return $this->fetchAll($sql);
	}

	public function getDepartmentByTitle($title){
		$title = $this->filterString($title);
		$sql = "select * from {$this->tableName} where title = '{$title}'";
		return $this->fetchAll($sql);
	}

	public function getDepartmentById($id){
		$id = intval($id);
		$sql = "select * from {$this->tableName} where id={$id}";
		return $this->fetchOne($sql);
	}

	public function modifyDepartment($department){
		$id = intval($department["id"]);
		$title = $this->filterString($department["title"]);
		$description = $this->filterString($department["description"]);
		$sql = "update {$this->tableName} set title = '{$title}', description = '{$description}' where id={$id}";
		$this->query($sql);
	}

	public function getTeacherNumber($id){
		$id = intval($id);
		$sql = "select count(id) as num from tss_user where id={$id}";
		$res = $this->fetchOne($sql);
		return $res["num"];
	}
}