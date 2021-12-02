<?php 
ob_start();
session_start();
if (isset($_POST['deleteAdminB'])){
	include('db.php');
	$admin = new Database();
	$idAdmin=intval($_POST['delAdminID']);
    var_dump($idAdmin);
	$res1 = $admin->deleteAdmin($idAdmin);
	if($res1){

			header('location: ../Admins.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>
