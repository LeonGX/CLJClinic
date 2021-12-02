<?php
ob_start();
session_start();
if (isset($_POST['createAccount'])){
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$appointments = new Database();
	$idDoctor = mysqli_real_escape_string($link, $_POST['doctor']); 
	$date = mysqli_real_escape_string($link, $_POST['date']);
	$hour = mysqli_real_escape_string($link, $_POST['hour']);
    
    $res1 = $appointments->createAppointment($idDoctor,$date,$hour);
    
    if($res1){
			header('location: ../Citas.php');
	}else{
		echo 'algo salio mal';
	}
    
}


?>