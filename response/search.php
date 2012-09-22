<?php
	/**
	* Processes search for patient records according to date or name or contact
	*/
	include_once '../model/patient.php';

		if($_GET['search'] == 'date')
		{
			$temp = new patient();
			$date = $_GET['psearch2'];
			echo json_encode($temp->searchDate($date));
		}
		else
		{
			$temp = new patient();
			$date = $_GET['psearch1'];
			echo json_encode($temp->search($date));

}
?>
