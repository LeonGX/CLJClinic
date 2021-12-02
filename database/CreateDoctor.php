<?php
ob_start();
session_start();
if (isset($_POST['createDoctor'])){

	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "211099", "hospital");
	$doctor = new Database();
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $birth= mysqli_real_escape_string($link, $_POST['birth']);
	$birth_place = mysqli_real_escape_string($link, $_POST['birth_place']);
    $email=mysqli_real_escape_string($link, $_POST['email']);
    $address=mysqli_real_escape_string($link, $_POST['address']);
    $gender=mysqli_real_escape_string($link, $_POST['gender']);
    $cel_number=mysqli_real_escape_string($link, $_POST['cel_number']);
    $home_number=mysqli_real_escape_string($link, $_POST['home_number']);
    $contact_number=mysqli_real_escape_string($link, $_POST['contact_number']);
    $license=mysqli_real_escape_string($link, $_POST['license']);
    $college=mysqli_real_escape_string($link, $_POST['college']);
    $specialty=mysqli_real_escape_string($link, $_POST['specialty']);
    $salary=mysqli_real_escape_string($link, $_POST['salary']);

    
    $res1 = $doctor->createDoctorPersonal($name, $last_name,$gender, $birth,$birth_place,$address,$email,$cel_number ,$home_number,$contact_number);

    if($res1){
        $res2 = $doctor->createDoctorMedic($license,$college,$specialty,$salary);
        if($res2)
        {
			header('location: ../Medicos.php');
        }
        else 
        {
            echo $res2;
        }
	}else{
		echo $res1;
	}

}
