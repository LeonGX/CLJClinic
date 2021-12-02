<?php

class Database
{
    private $con;
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "211099";
    private $dbname = "hospital";
    function __construct()
    {
        $this->connect_db();
    }
    public function connect_db()
    {
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if (mysqli_connect_error()) {
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }
    public function createUser($username, $name, $last_name, $password, $gender, $email)
    {
        $sha = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (idUser,username, `name`, last_name, `password`, gender, email,rol) VALUES (NULL, '" . $username . "','" . $name . "', '" . $last_name . "','" . $sha . "', (SELECT idGender from gender where idGender='" . $gender . "'),  '" . $email . "', 1)";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }

    public function updateAdmin($idAdmin, $name, $last_name, $username, $email)
    {
        $sql =  "UPDATE users SET name = '" . $name . "', last_name='" . $last_name . "', username='" . $username . "', email='" . $email . "' WHERE idUser = '" . $idAdmin . "' ";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            echo $res;
        }
    }

    public function updateDoctor($idDoctor, $name, $last_name, $cel_number)
    {
        $sql =  "UPDATE doctorspersonal SET name = '" . $name . "', last_name='" . $last_name . "', cel_number='" . $cel_number . "' WHERE idDoctorP = '" . $idDoctor . "' ";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            echo $res;
        }
    }

    public function updateNurse($idNurse, $name, $last_name, $cel_number)
    {
        $sql =  "UPDATE nursespersonal SET name = '" . $name . "', last_name='" . $last_name . "', cel_number='" . $cel_number . "' WHERE idNurseP = '" . $idNurse . "' ";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            echo $res;
        }
    }
    public function updatePatient($idPatient, $name, $last_name, $cel_number)
    {
        $sql =  "UPDATE patientspersonal SET name = '" . $name . "', last_name='" . $last_name . "', cel_number='" . $cel_number . "' WHERE idPatientP = '" . $idPatient . "' ";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            echo $res;
        }
    }


    public function deleteAdmin($idAdmin)
    {
        $sql = "DELETE FROM users WHERE idUser=$idAdmin";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function createDoctorPersonal($name, $last_name, $gender, $birth, $birth_place, $address, $email, $cel_number, $home_number, $contact_number)
    {
        $sql = "INSERT INTO doctorspersonal (idDoctorP, `name`, last_name, gender,birth,birth_place,`address`, email,cel_number,home_number,contact_number) VALUES (NULL, '" . $name . "', '" . $last_name . "', (SELECT idGender from gender where idGender='" . $gender . "'),'" . $birth . "','" . $birth_place . "', '" . $address . "', '" . $email . "',  '" . $cel_number . "' , '" . $home_number . "' , '" . $contact_number . "' )";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }
    public function createDoctorMedic($license, $college, $specialty, $salary)
    {
        $sql = "INSERT INTO doctorsmedic (idDoctorM, license, college, specialty,salary) VALUES ((SELECT idDoctorP from doctorspersonal ORDER BY idDoctorP DESC LIMIT 1), '" . $license . "', '" . $college . "', '" . $specialty . "','" . $salary . "')";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }
    public function deleteDoctorPersonal($idDoctor)
    {
        $sql = "DELETE FROM doctorspersonal WHERE idDoctorP=$idDoctor";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteDoctorMedic($idDoctor)
    {
        $sql = "DELETE FROM doctorsmedic WHERE idDoctorM=$idDoctor";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function createNursePersonal($name, $last_name, $gender, $birth, $birth_place, $address, $email, $cel_number, $home_number, $contact_number)
    {
        $sql = "INSERT INTO nursespersonal (idNurseP, `name`, last_name, gender,birth,birth_place,`address`, email,cel_number,home_number,contact_number) VALUES (NULL, '" . $name . "', '" . $last_name . "', (SELECT idGender from gender where idGender='" . $gender . "'),'" . $birth . "','" . $birth_place . "', '" . $address . "', '" . $email . "',  '" . $cel_number . "' , '" . $home_number . "' , '" . $contact_number . "' )";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }

    public function createNurseMedic($license, $college, $salary)
    {
        $sql = "INSERT INTO nursesmedic (idNurseM, license, college, salary) VALUES ((SELECT idNurseP from nursespersonal ORDER BY idNurseP DESC LIMIT 1), '" . $license . "', '" . $college . "', '" . $salary . "')";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }
    public function deleteNursePersonal($idNurse)
    {
        $sql = "DELETE FROM nursespersonal WHERE idNurseP=$idNurse";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteNurseMedic($idNurse)
    {
        $sql = "DELETE FROM nursesmedic WHERE idNurseM=$idNurse";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePatientPersonal($idPatient)
    {
        $sql = "DELETE FROM patientspersonal WHERE idPatientP=$idPatient";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePatientMedic($idPatient)
    {
        $sql = "DELETE FROM patientsmedic WHERE idPatientM=$idPatient";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function createPatientPersonal($name, $last_name, $gender, $birth, $address, $cel_number, $contact_number)
    {
        $sql = "INSERT INTO patientspersonal (idPatientP, `name`, last_name, gender,birth,`address`,cel_number,contact_number) VALUES (NULL, '" . $name . "', '" . $last_name . "', (SELECT idGender from gender where idGender='" . $gender . "'),'" . $birth . "','" . $address . "',  '" . $cel_number . "' , '" . $contact_number . "' )";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }
    public function createPatientMedic($diagnose, $area, $height, $weight, $blood_type, $allergies, $commorbilities)
    {
        $sql = "INSERT INTO patientsmedic (idPatientM, diagnose,area,`entry`,discharge,height,`weight`,blood_type,allergies,commorbilities) VALUES ((SELECT idPatientP from patientspersonal ORDER BY idPatientP DESC LIMIT 1), '" . $diagnose . "', '" . $area . "',current_timestamp(), NULL, '" . $height . "', '" . $weight . "', '" . $blood_type . "', '" . $allergies . "', '" . $commorbilities . "')";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }


    public function readAdmin()
    {
        $sql = "SELECT * FROM users INNER JOIN gender ON users.gender=gender.idGender";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function readDoctor()
    {
        $sql = "SELECT idDoctorP,name,last_name,gender.gender,email,cel_number,license,specialties.specialty,timestampdiff(year, birth, CURRENT_DATE) as age FROM doctorspersonal INNER JOIN doctorsmedic ON doctorspersonal.idDoctorP=doctorsmedic.idDoctorM INNER JOIN gender ON doctorspersonal.gender=gender.idGender INNER JOIN specialties ON doctorsmedic.specialty=specialties.idSpecialty";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
    public function readNurse()
    {
        $sql = "SELECT idNurseP,name,last_name,gender.gender,email,cel_number,license,timestampdiff(year, birth, CURRENT_DATE) as age FROM nursespersonal INNER JOIN nursesmedic ON nursespersonal.idNurseP=nursesmedic.idNurseM INNER JOIN gender ON nursespersonal.gender=gender.idGender";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
    public function readPatient()
    {
        $sql = "SELECT idPatientP,name,last_name,areas.area,diagnose,gender.gender,cel_number,timestampdiff(year, birth, CURRENT_DATE) as age,blood_types.blood_type as blood_type FROM patientspersonal INNER JOIN patientsmedic ON patientspersonal.idPatientP=patientsmedic.idPatientM INNER JOIN gender ON patientspersonal.gender=gender.idGender INNER JOIN blood_types ON patientsmedic.blood_type=blood_types.idBloodType INNER JOIN areas on patientsmedic.area=areas.idArea;";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function readSpecialty()
    {
        $sql = "SELECT * FROM specialties ORDER BY specialty ASC";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function readAreas()
    {
        $sql = "SELECT * FROM areas ORDER BY area ASC";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function readLogs()
    {
        $sql = "SELECT * FROM logs INNER JOIN doctorspersonal on logs.idDoctor=doctorspersonal.idDoctorP";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function getOccupation()
    {
        $sql = "SELECT SUM(beds_available) FROM areas";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 510) {
            $res = 0;
        } else {
            $res = (100 - ($count[0] * 100) / 510);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getPaliativeCare()
    {
        $sql = "SELECT beds_available FROM areas where area='Cuidados Paliativos'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 30) {
            $res = 0;
        } else {
            $res = (((30 - ($count[0])) * 100) / 30);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getMaternity()
    {
        $sql = "SELECT beds_available FROM areas where area='Maternidad'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 30) {
            $res = 0;
        } else {
            $res = (((30 - ($count[0])) * 100) / 30);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getGeneral()
    {
        $sql = "SELECT beds_available FROM areas where area='Pabellón General'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 200) {
            $res = 0;
        } else {
            $res = (((200 - ($count[0])) * 100) / 200);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getPediatry()
    {
        $sql = "SELECT beds_available FROM areas where area='Pediatría'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 70) {
            $res = 0;
        } else {
            $res = (((70 - ($count[0])) * 100) / 70);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getOperation()
    {
        $sql = "SELECT beds_available FROM areas where area='Quirófano'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 15) {
            $res = 0;
        } else {
            $res = (((15 - ($count[0])) * 100) / 15);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getUCI()
    {
        $sql = "SELECT beds_available FROM areas where area='Unidad de Cuidados Intensivos'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 95) {
            $res = 0;
        } else {
            $res = (((95 - ($count[0])) * 100) / 95);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getUrgencies()
    {
        $sql = "SELECT beds_available FROM areas where area='Urgencias'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        if ($count[0] == 65) {
            $res = 0;
        } else {
            $res = (((65 - ($count[0])) * 100) / 65);
        }
        return number_format((float)$res, 2, '.', '');
    }
    public function getBedsAvailable()
    {
        $sql = "SELECT SUM(beds_available) FROM areas";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        return $count[0];
    }
    public function getIncomes()
    {
        $sql = "SELECT SUM(income) from invoices where MONTH(date)=MONTH(CURRENT_DATE) and YEAR(date)=YEAR(CURRENT_DATE);";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        return $count[0];
    }
    public function getAppointments()
    {
        $sql = "SELECT COUNT(*) FROM `appointments` WHERE status=1;";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_fetch_array($result);
        return $count[0];
    }
    public function getPersonal()
    {
        $sql = "SELECT ( SELECT COUNT(*) FROM users ) AS Administradores, 
        ( SELECT COUNT(*) FROM doctorspersonal ) AS Médicos, 
        ( SELECT COUNT(*) FROM nursespersonal ) AS Enfermeros FROM dual;";
        $result = mysqli_query($this->con, $sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }
    public function getPatientsByGender()
    {
        $sql = "SELECT (SELECT COUNT(*) from patientspersonal where gender=1) as women,
         (SELECT COUNT(*) from patientspersonal WHERE gender=2) as men from DUAL;";
        $result = mysqli_query($this->con, $sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function getPatientsByBlood()
    {
        $sql = "SELECT (SELECT COUNT(*) from patientsmedic where blood_type=1) as apos,
         (SELECT COUNT(*) from patientsmedic WHERE blood_type=2) as aneg,
         (SELECT COUNT(*) from patientsmedic WHERE blood_type=3) as opos,
         (SELECT COUNT(*) from patientsmedic WHERE blood_type=4) as oneg,
         (SELECT COUNT(*) from patientsmedic WHERE blood_type=5) as bpos,
         (SELECT COUNT(*) from patientsmedic WHERE blood_type=6) as bneg,
         (SELECT COUNT(*) from patientsmedic WHERE blood_type=7) as abpos,
         (SELECT COUNT(*) from patientsmedic WHERE blood_type=8) as abneg
          from DUAL;";
        $result = mysqli_query($this->con, $sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function getPatientsByAge()
    {
        $sql = "SELECT (SELECT COUNT(timestampdiff(year,birth,CURRENT_DATE)) from patientspersonal where timestampdiff(year,patientspersonal.birth,CURRENT_DATE)<18) AS menores,
        (SELECT COUNT(timestampdiff(year,birth,CURRENT_DATE)) from patientspersonal where timestampdiff(year,birth,CURRENT_DATE)>18 and timestampdiff(year,birth,CURRENT_DATE)<=35 ) AS mayores18, 
        (SELECT COUNT(timestampdiff(year,birth,CURRENT_DATE)) from patientspersonal where timestampdiff(year,birth,CURRENT_DATE)>35 and timestampdiff(year,birth,CURRENT_DATE)<=50 ) AS mayores35,
        (SELECT COUNT(timestampdiff(year,birth,CURRENT_DATE)) from patientspersonal where timestampdiff(year,birth,CURRENT_DATE)>50 and timestampdiff(year,birth,CURRENT_DATE)<=75 ) AS mayores50,
        (SELECT COUNT(timestampdiff(year,birth,CURRENT_DATE)) from patientspersonal where timestampdiff(year,birth,CURRENT_DATE)>75 ) AS mayores70 from DUAL;";
        $result = mysqli_query($this->con, $sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }

    public function getEntries()
    {
        $sql = "SELECT (SELECT COUNT(*) from patientsmedic where MONTH(entry)=1) AS enero,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=2) as febrero,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=3) AS marzo,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=1)
         AS abril,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=5) AS mayo,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=6) AS junio,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=7) AS julio,
         (SELECT COUNT(*) from patientsmedic where MONTH(entry)=8) AS agosto,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=8) AS septiembre,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=10) AS octubre,
         (SELECT COUNT(*) from patientsmedic where MONTH(entry)=11) AS noviembre,(SELECT COUNT(*) from patientsmedic where MONTH(entry)=12) AS diciembre from dual;";
        $result = mysqli_query($this->con, $sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        print json_encode($data);
    }
    public function getPatientAccount($idArea)
    {
        $sql = "SELECT idPatientM,patientspersonal.name, patientspersonal.last_name FROM patientsmedic INNER JOIN patientspersonal on patientspersonal.idPatientP=patientsmedic.idPatientM WHERE area=$idArea";
        $res = mysqli_query($this->con, $sql);
        if ($res->num_rows !== 0) {

            while ($row = mysqli_fetch_array($res)) {
                $result[] = array(
                    'id' => $row['idPatientM'],
                    'name' => $row['name'],
                    'last_name' => $row['last_name']
                );
            }
            echo json_encode($result);
        }
        else {
            echo 0;
        }
    }

    public function createInvoice($idPatient, $account)
    {
        $sql = "INSERT INTO invoices (idInvoices, patient, income,date) VALUES (NULL, '" . $idPatient . "', '" . $account . "',current_timestamp())";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }
    public function readinvoice()
    {
        $sql = "SELECT * FROM invoices INNER JOIN patientspersonal ON invoices.patient=patientspersonal.idPatientP";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function getDoctorAppointment($idSpecialty)
    {
        $sql = "SELECT idDoctorM,doctorspersonal.name, doctorspersonal.last_name FROM doctorsmedic INNER JOIN doctorspersonal on doctorspersonal.idDoctorP=doctorsmedic.idDoctorM WHERE specialty=$idSpecialty";
        $res = mysqli_query($this->con, $sql);
        if ($res->num_rows !== 0) {

            while ($row = mysqli_fetch_array($res)) {
                $result[] = array(
                    'id' => $row['idDoctorM'],
                    'name' => $row['name'],
                    'last_name' => $row['last_name']
                );
            }
            echo json_encode($result);
        }
        else {
            echo 0;
        }
    }

    public function createAppointment($idDoctor, $date, $hour)
    {
        $sql = "INSERT INTO appointments (idAppointment, doctor,date,hour,status) VALUES (NULL, '" . $idDoctor . "', '" . $date . "', '" . $hour . "',1)";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        return $res;
        if ($res) {
            return true;
        } else {
            return $res;
        }
    }
    public function readAppointment()
    {
        $sql = "SELECT * FROM appointments INNER JOIN doctorspersonal ON appointments.doctor=doctorspersonal.idDoctorP INNER JOIN statuses on appointments.status=statuses.idStatus";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
}
