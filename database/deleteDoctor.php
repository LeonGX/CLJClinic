<?php 
ob_start();
session_start();
if (isset($_POST['deleteDoctorB'])){
	include('db.php');
	$doctor = new Database();
	$idDoctor=intval($_POST['delDoctorID']);
	$res1 = $doctor->deleteDoctorPersonal($idDoctor);
	if($res1){
	$res2 = $doctor->deleteDoctorMedic($idDoctor);
    if($res2)
    {
        header('location: ../Medicos.php');

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
