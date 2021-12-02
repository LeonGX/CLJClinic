<?php
ob_start();
session_start();
if (isset($_POST['createAdmin'])){
	require_once 'db.php';
	$link = mysqli_connect("localhost", "root", "", "hospital");
	$admin = new Database();
	$name = mysqli_real_escape_string($link, $_POST['name']); 
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $username= mysqli_real_escape_string($link, $_POST['username']);
    $email=mysqli_real_escape_string($link, $_POST['email']);
	$password = mysqli_real_escape_string($link, $_POST['password1']); 
	$correo = mysqli_real_escape_string($link, $_POST['correo']); 
    $contraseña=mysqli_real_escape_string($link, $_POST['contraseña']); 
    $gender=mysqli_real_escape_string($link, $_POST['gender']); 
    $res1 = $admin->createUser($username, $name, $last_name, $password, $gender, $email);
    
    if($res1){
			header('location: ../Admins.php');
	}else{
		echo 'algo salio mal';
	}
    
}


?>