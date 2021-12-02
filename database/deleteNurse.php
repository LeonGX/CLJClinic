<?php 
ob_start();
session_start();
if (isset($_POST['deleteNurseB'])){
	include('db.php');
	$nurse = new Database();
	$idNurse=intval($_POST['delNurseID']);
	$res1 = $nurse->deleteNursePersonal($idNurse);
	if($res1){
	$res2 = $nurse->deleteNurseMedic($idNurse);
    if($res2)
    {
        header('location: ../Enfermeria.php');

    }
    else
    {
		echo "Error al eliminar el registro medico";

    }

	}else{
		echo "Error al eliminar el registr personal";
	}
}
?>
