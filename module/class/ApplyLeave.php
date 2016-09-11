<?php

class ApplyLeave1{
	public $ApplyLeaveId;//line 3

	function fetchApplyLeaveDate($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT date FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['date'];
	}

	function fetchApplyLeaveStartDate($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT start_date FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['start_date'];
	}

	function fetchApplyLeaveEndDate($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT end_date FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['end_date'];
	}
	function fetchApplyLeaveReason($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT reason FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['reason'];
	}

	function fetchApplyLeaveStatus($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT status FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['status'];
	}

	function fetchApplyLeaveCompId($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT comp_id FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['comp_id'];
	}

	function fetchApplyLeaveEventId($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT event_id FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['event_id'];
	}

	function fetchApplyLeaveLeaveId($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT leave_id FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['leave_id'];
	}

	function fetchApplyLeaveGroupId($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT group_id FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['group_id'];
	}

	function fetchApplyLeaveMedId($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT med_id FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['med_id'];
	}

	function fetchApplyLeaveManagerId($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT manager_id FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['manager_id'];
	}

	function fetchApplyLeaveExecuteId($pdo){
		$param = $this->ApplyLeaveId;
		$sql = "SELECT executive_id FROM apply_leave WHERE apply_leave_id=:emp_id";
		$query = $pdo->prepare($sql);
		$query->execute(array('emp_id'=>$param));
		$result = $query->fetch();
		return $result ['executive_id'];
	}
}

?>