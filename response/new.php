<?php
	/**
	* Processes new patient registration
	* object declaration will invoke the corrosponding function and exicute it
	*/

include_once '../model/patient.php';
	$status=array();
	$u = new patient($_POST['pname'],$_POST['pcontact'],$_POST['pdate'],$_POST['pissue'],$_POST['pdiag'],$_POST['ppres']);
	if(!$u){
		$status['status']=0;
		echo json_encode($status);
		exit;
	}
	else{
		$status['status']=1;
		echo json_encode($status);
		header("Location: ../form.php");

	}

?>
