<?php

class Department{
	public $dptId;//line 3

	function fetchDepartmentName($pdo){
		$param = $this->dptId;
		$sql = "SELECT dept_name FROM department WHERE dept_id=:dp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('dp_id'=>$param));
		$result = $query->fetch();
		return $result ['dept_name'];
	}

	function fetchDepartmentNoOfEmployee($pdo){
		$param = $this->dptId;
		$sql = "SELECT no_of_emp FROM department WHERE dept_id=:dp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('dp_id'=>$param));
		$result = $query->fetch();
		return $result ['no_of_emp'];
	}

	function fetchDepartmentDeptColour($pdo){
		$param = $this->dptId;
		$sql = "SELECT dept_color FROM department WHERE dept_id=:dp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('dp_id'=>$param));
		$result = $query->fetch();
		return $result ['dept_color'];
	}

	function fetchDepartmentRosterStatus($pdo){
		$param = $this->dptId;
		$sql = "SELECT roster_status FROM department WHERE dept_id=:dp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('dp_id'=>$param));
		$result = $query->fetch();
		return $result ['roster_status'];
	}

	function fetchDepartmentCurrentStatus($pdo){
		$param = $this->dptId;
		$sql = "SELECT currentStatus FROM department WHERE dept_id=:dp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('dp_id'=>$param));
		$result = $query->fetch();
		return $result ['currentStatus'];
	}

}

?>