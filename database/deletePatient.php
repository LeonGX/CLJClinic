<?php 
ob_start();
session_start();
if (isset($_POST['deletePatientB'])){
	include('db.php');
	$patient = new Database();
	$idPatient=intval($_POST['delPatientID']);
	$res1 = $patient->deletePatientPersonal($idPatient);
	if($res1){
	$res2 = $patient->deletePatientMedic($idPatient);
    if($res2)
    {
        header('location: ../Pacientes.php');

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
