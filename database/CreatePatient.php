<?php
ob_start();
session_start();
if (isset($_POST['createPatient'])){

	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$patient = new Database();
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $birth= mysqli_real_escape_string($link, $_POST['birth']);
    $address=mysqli_real_escape_string($link, $_POST['address']);
    $gender=mysqli_real_escape_string($link, $_POST['gender']);
    $cel_number=mysqli_real_escape_string($link, $_POST['cel_number']);
    $contact_number=mysqli_real_escape_string($link, $_POST['contact_number']);
    $diagnose=mysqli_real_escape_string($link, $_POST['diagnose']);
    $area=mysqli_real_escape_string($link, $_POST['area']);
    $height=mysqli_real_escape_string($link, $_POST['height']);
    $weight=mysqli_real_escape_string($link, $_POST['weight']);
    $blood_type=mysqli_real_escape_string($link, $_POST['blood_type']);
    $area=mysqli_real_escape_string($link, $_POST['area']);
    $allergies=mysqli_real_escape_string($link, $_POST['allergies']);
    $commorbilities=mysqli_real_escape_string($link, $_POST['commorbilities']);

    
    $res1 = $patient->createPatientPersonal($name, $last_name,$gender, $birth,$address,$cel_number ,$contact_number);

    if($res1){
        $res2 = $patient->createPatientMedic($diagnose,$area,$height,$weight,$blood_type,$allergies,$commorbilities);
        if($res2)
        {
			header('location: ../Pacientes.php');
        }
        else 
        {
            echo $res2;
        }
	}else{
		echo $res1;
	}

}
