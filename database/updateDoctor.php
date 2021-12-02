<?php 
ob_start();
session_start();
if (!empty($_POST['updateDoctor'])){
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$doctors = new Database();
	$idDoctor=intval($_POST['updDoctorID']);
	$upd_name = mysqli_real_escape_string($link, $_POST['upd_name']); 
	$upd_last_name = mysqli_real_escape_string($link, $_POST['upd_last_name']); 
	$upd_cel_number = mysqli_real_escape_string($link, $_POST['upd_cel_number']); 
	$res1 = $doctors->updateDoctor($idDoctor,$upd_name,$upd_last_name,$upd_cel_number);
	if($res1){

			header('location: ../Medicos.php');
	}else{
		echo "Error al actualizar el registro";
	}
    
}


?>
  
