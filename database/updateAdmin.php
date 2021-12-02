<?php 
ob_start();
session_start();
if (!empty($_POST['updateAdmin'])){
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$admins = new Database();
	$idAdmin=intval($_POST['updAdminID']);
	$upd_name = mysqli_real_escape_string($link, $_POST['upd_name']); 
	$upd_last_name = mysqli_real_escape_string($link, $_POST['upd_last_name']); 
	$upd_username = mysqli_real_escape_string($link, $_POST['upd_username']); 
	$upd_email = mysqli_real_escape_string($link, $_POST['upd_email']); 
	$res1 = $admins->updateAdmin($idAdmin,$upd_name,$upd_last_name,$upd_username,$upd_email);
	if($res1){

			header('location: ../Admins.php');
	}else{
		echo "Error al actualizar el registro";
	}
    
}


?>
  
