<?php
ob_start();
session_start();
if (isset($_POST['createNurse'])){

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
    $salary=mysqli_real_escape_string($link, $_POST['salary']);

    
    $res1 = $doctor->createNursePersonal($name, $last_name,$gender, $birth,$birth_place,$address,$email,$cel_number ,$home_number,$contact_number);

    if($res1){
        $res2 = $doctor->createNurseMedic($license,$college,$salary);
        if($res2)
        {
			header('location: ../Enfermeria.php');
        }
        else 
        {
            echo $res2;
        }
	}else{
		echo $res1;
	}

}
