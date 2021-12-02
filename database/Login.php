<?php
ob_start();
//Para iniciar sesión
if (isset($_POST["action"])) {
    include 'db.php';
    $link = mysqli_connect("localhost", "root", "211099", "hospital");
    $user = $_POST["user"];
    $pass     = $_POST["password"];
    $queryusuario = mysqli_query($link, "SELECT * FROM users  WHERE username = '" . $user . "' or email= '" . $user . "'");
    $nr         = mysqli_num_rows($queryusuario);
    $mostrar    = mysqli_fetch_array($queryusuario);
    $password = $mostrar['password'];
    $user = $mostrar['username'];
    $emailuser = $mostrar['email'];



    if (($nr == 1) && (password_verify($pass, $mostrar['password']))) {
        
        session_start();
        $_SESSION['user'] = $mostrar['username'];
        $_SESSION['idUser'] = $mostrar['idUser'];
        $output = 1;
        echo $output;
       
    } else {
        $output = 2;
        echo $output;
    }
}
