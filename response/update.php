<?php
	/**
	* create object for sending data to database to update the edited results 
	*/

include_once '../model/patient.php';
	$u = new patient();
	$u->update($_POST['pname'],$_POST['pcontact'],$_POST['pdate'],$_POST['pissue'],$_POST['pdiag'],$_POST['ppres'],$_POST['pid']);

?>
