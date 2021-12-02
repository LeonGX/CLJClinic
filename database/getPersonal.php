<?php
ob_start();
session_start();
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$personal= new Database();
    $res = $personal->getPersonal();
    echo $res;
    


?>