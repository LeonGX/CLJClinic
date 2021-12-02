<?php
ob_start();
session_start();
if (isset($_POST['idSpecialty'])){
    $idSpecialty=$_POST['idSpecialty'];
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$patients= new Database();
    $res = $patients->getDoctorAppointment($idSpecialty);
    echo $res;
}


?>