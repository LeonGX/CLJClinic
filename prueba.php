<?php

include('database/db.php');
$specialties = new Database();
$list_specialty = $specialties->readSpecialty();
while ($row = mysqli_fetch_object($list_specialty)) {
    echo $row->specialty;
}


?>