<?php

class Employee{
	public $empId;//line 3
	
	 function fetchEmployeeName($pdo){//ok
		$param = $this->empId;     //this.emp.Id
		$sql="SELECT name FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);      //prepare sql to query language 
		$query->execute(array('emp_id'=>$param));  //
		$result = $query->fetch();	//take data to result(fetch)
		 echo " ";
		return $result['name'];
	}

	function fetchEmployeeNic($pdo){//ok
		$param = $this->empId;//parameter like constructer*
		$sql = "SELECT nic FROM employee WHERE comp_id=:emp_id";//SQL*
		$query = $pdo->prepare($sql);//The connection that we get from up php file.we use that connection to prepare.
		$query->execute(array('emp_id'=>$param));//emp_id in line 3=this.empId
		$result = $query->fetch();//collect ddata from query
		return $result['nic'];
		echo " ";
	}

	function fetchEmployeeGender($pdo){//ok
		$param = $this->empId;
		$sql = "SELECT gender FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result['gender'];
		echo " ";
	}

	function fetchEmployeeEmail($pdo){//ok
		$param = $this->empId;
		$sql="SELECT email FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();//collect
		return $result['email'];
		echo " ";

	}

	function fetchEmployeePassword($pdo){//ok
		$param=$this->empId;
		$sql="SELECT password FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result['password'];
		echo " ";
	}

	function fetchEmployeeTelNo($pdo){//ok
		$param=$this->empId;
		$sql="SELECT tel_no FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result['tel_no'];
		echo " ";
	}

	function fetchEmployeeImage($pdo){
		$param=$this->empId;
		$sql="SELECT image FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result['image'];
		echo " ";
	}

	function fetchEmployeeEmpLevel($pdo){
		$param=$this->empId;
		$sql="SELECT emp_level FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result['emp_level'];
		echo " ";
	}


	function fetchEmployeeJobCatId($pdo){
		$param=$this->empId;
		$sql="SELECT job_cat_id FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		echo " ";
		return $result['job_cat_id'];
	}


	function fetchEmployeeGroupId($pdo){
		$param = $this->empId;
		$sql = "SELECT group_id FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result['group_id'];

	}


	function fetchEmployeeDeptId($pdo){//ok
		$param = $this->empId;
		$sql = "SELECT dept_id FROM employee WHERE comp_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result['dept_id'];
	}




}

?>