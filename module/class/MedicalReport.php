<?php

class Medical1{
	public $medId;//line 3

	function fetchmedicalReportCompId($pdo){
		$param = $this->medId;
		$sql = "SELECT comp_id FROM medical_report WHERE med_id=:medId1";
		$query = $pdo->prepare($sql);
		$query->execute(array('medId1'=>$param));
		$result = $query->fetch();
		return $result ['comp_id'];
	}

	function fetchmedicalReportStatus($pdo){
		$param = $this->medId;
		$sql = "SELECT status FROM medical_report WHERE med_id=:medId1";
		$query = $pdo->prepare($sql);
		$query->execute(array('medId1'=>$param));
		$result = $query->fetch();
		return $result ['status'];
	}


}

?>