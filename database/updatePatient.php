<?php 
ob_start();
session_start();
if (!empty($_POST['updatePatientB'])){
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$patients = new Database();
	$idPatient=intval($_POST['updPatientID']);
	$upd_name = mysqli_real_escape_string($link, $_POST['upd_name']); 
	$upd_last_name = mysqli_real_escape_string($link, $_POST['upd_last_name']); 
	$upd_cel_number = mysqli_real_escape_string($link, $_POST['upd_cel_number']); 
	$res1 = $patients->updatePatient($idPatient,$upd_name,$upd_last_name,$upd_cel_number);
    echo $res1;
	if($res1){

			header('location: ../Pacientes.php');
	}else{
		echo "Error al actualizar el registro";
	}
    
}


?>
  
