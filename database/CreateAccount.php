<?php
ob_start();
session_start();
if (isset($_POST['createAccount'])){
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "", "hospital");
	$accounts = new Database();
	$idPatient = mysqli_real_escape_string($link, $_POST['patient']); 
	$account = mysqli_real_escape_string($link, $_POST['account']);
    
    $res1 = $accounts->createInvoice($idPatient,$account);
    
    if($res1){
			header('location: ../Cobranza.php');
	}else{
		echo 'algo salio mal';
	}
    
}


?>