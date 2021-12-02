<?php
ob_start();
session_start();
if (isset($_POST['idArea'])){
    $idArea=$_POST['idArea'];
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$patients= new Database();
    $res = $patients->getPatientAccount($idArea);
    echo $res;
}


?>