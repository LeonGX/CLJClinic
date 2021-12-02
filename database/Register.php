<?php
include 'db.php';
$registro = new Database();
$output = ' ';
$conexion = mysqli_connect("localhost", "root", "211099", "hospital");
if (isset($_POST['action'])) {

    $checkun = $_POST['username'];

    $sqlun = "SELECT*FROM users where username='" . $checkun . "'";
    $resun = mysqli_query($conexion, $sqlun);
    if (!empty($resun) && $resun->num_rows > 0) {
        $output = 1;
    } else {
        $checkm = $_POST['email'];
        $sqlm = "SELECT*FROM users where email='" . $checkm . "'";
        $resm = mysqli_query($conexion, $sqlm);
        if (!empty($resm) && $resm->num_rows > 0) {
            $output = 2;
        } else {

            $username = mysqli_real_escape_string($conexion, $_POST['username']);
            $name = mysqli_real_escape_string($conexion, $_POST['name']);
            $last_name = mysqli_real_escape_string($conexion, $_POST['last_name']);
            $gender = intval( mysqli_real_escape_string($conexion, $_POST['gender'])) ;
            $email = mysqli_real_escape_string($conexion, $_POST['email']);
            $password = mysqli_real_escape_string($conexion, $_POST['password']);
            $res1 = $registro->createUser($username, $name, $last_name, $password, $gender, $email);
            if($res1){
                $output=3;
            }else{
                $output=4;
            }
           
        }
    }





    echo $output;
}
