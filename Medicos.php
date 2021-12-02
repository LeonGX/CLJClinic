<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('Location: /login.html');
}
include('database/db.php');
$doctors = new Database();
$list_specialty = $doctors->readSpecialty();
$list_doctors = $doctors->readDoctor();

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CLJ Clinic</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/heartbeat_icon-icons.com_56347.ico" type="image/x-icon" />
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <img src="img/heartbeat_icon-icons.com_56347.ico" alt="logo-CLJClinic">
                </div>
                <div class="sidebar-brand-text mx-3">CLJ Clinic</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administración
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Registros</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="Admins.php"> <i class="fas fa-fw fa-user-shield"></i> Administradores</a>
                        <a class="collapse-item"> <i class="fas fa-fw fa-user-md"></i> Médicos</a>
                        <a class="collapse-item" href="Enfermeria.php"> <i class="fas fa-fw fa-user-nurse"></i> Enfermería</a>
                        <a class="collapse-item" href="Pacientes.php"> <i class="fas fa-fw fa-user-injured"></i> Pacientes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-toolbox"></i>
                    <span>Recursos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Citas.php"> <i class="fas fa-fw fa-address-book"></i> Citas</a>
                        <a class="collapse-item" href="Cobranza.php"><i class="fas fa-fw fa-balance-scale mr-1"></i>Cobranza</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Información
            </div>

          

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="Estadisticas.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Estadísticas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Bitacora.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Bitácora</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST">
                                    <button class="dropdown-item" name="logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>

                                </form>

                                <?php

                                if (isset($_POST['logout'])) {
                                    session_destroy();
                                    header('location: login.html');
                                }
                                ?>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 pl-4 pt-4 pr-4">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de Médicos</h6>
                            <button id='addMedic' class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-100"></i> Registrar médico</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Edad</th>
                                            <th>Género</th>
                                            <th>Especialidad</th>
                                            <th>Cédula</th>
                                            <th>Teléfono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_object($list_doctors)) {
                                            $idDoctorP = $row->idDoctorP;
                                            $name = $row->name;
                                            $last_name = $row->last_name;
                                            $gender = $row->gender;
                                            $birth = $row->age;
                                            $email = $row->email;
                                            $cel_number = $row->cel_number;
                                            $license = $row->license;
                                            $specialty = $row->specialty;



                                        ?>
                                            <tr>
                                                <td><?php echo $idDoctorP; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $last_name; ?></td>
                                                <td><?php echo $birth ?></td>
                                                <td><?php echo $gender; ?></td>
                                                <td><?php echo $specialty; ?></td>
                                                <td><?php echo $license; ?></td>
                                                <td><?php echo $cel_number; ?></td>
                                                <td>
                                                    <a class="updateDoctor" title="Editar" data-toggle="modal"><i class="fas fa-pencil-alt">&#xE254;</i></a>
                                                    <a class="deleteDoctor" title="Eliminar" data-toggle="modal"><i class="fas fa-trash">&#xE872;</i></a>
                                                </td>

                                            </tr>
                                        <?php

                                        }
                                        ?>
                                        <div id="deleteDoctorModal" class="modal fade" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                    <form action="database/deleteDoctor.php" method="POST">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="delDoctorID" id="delDoctorID">

                                                            </input>
                                                            <p>Estas seguro que deseas borrar este registro?</p>
                                                            <p id="nameDAmin">

                                                            </p>
                                                            <p id="last_nameDAdmin">

                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                            <input type="submit" name="deleteDoctorB" class="btn btn-danger" value="Eliminar">
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="updateDoctorModal" class="modal fade" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5>Actualizar registro de <b>Médico</b></h5>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form method="POST" action="database/updateDoctor.php">
                                                            <div class="col-md-6">
                                                                <label>Nombre:</label>
                                                                <input type="hidden" name="updDoctorID" id="updDoctorID">
                                                                <input type="text" name="upd_name" id="upd_name" class='form-control' maxlength="100" required>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Apellido:</label>
                                                                <input type="text" name="upd_last_name" id="upd_last_name" class='form-control' maxlength="100" required>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <label>Teléfono:</label>
                                                                <input type="text" name="upd_cel_number" id="upd_cel_number" class='form-control' maxlength="64" required>


                                                            </div>
                                                            

                                                            <div class="modal-footer">
                                                                <hr>
                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                                <input type="submit" name="updateDoctor" class="btn btn-success" value="Actualizar">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade " id="addMedicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Registrar Médico</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <label for="validationCustom01" class="form-label">Datos Personales</label>
                                    <form action="database/CreateDoctor.php" method="POST" class="row g-3 needs-validation" novalidate>
                                        <div class="col-md-3">
                                            <label for="validationCustom01" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" name="name" id="name" required>
                                            <div class="invalid-feedback">
                                                Introduce un nombre
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom02" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" required>
                                            <div class="invalid-feedback">
                                                Introduce un apellido
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom04" class="form-label">Género</label>
                                            <select class="form-control" name="gender" id="gender" required>
                                                <option selected disabled value="">Sexo</option>
                                                <option value="1">Femenino</option>
                                                <option value="2">Masculino</option>
                                                <option value="3">Indefinido</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Introduce género
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom02" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" data-date name="birth" id="birth" required>
                                            <div class="invalid-feedback">
                                                Introduce una fecha
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="validationCustom03" class="form-label">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" name="birth_place" id="birth_place" required>
                                            <div class="invalid-feedback">
                                                Introduce un lugar de nacimiento válido
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom03" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" name="address" id="address" required>
                                            <div class="invalid-feedback">
                                                Introduce una dirección válida
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom05" class="form-label">Correo</label>
                                            <input type="text" class="form-control" name="email" id="email" required>
                                            <div class="invalid-feedback">
                                                Introduce un correo válido
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom05" class="form-label">Celular</label>
                                            <input type="number" class="form-control" name="cel_number" id="cel_number" required>
                                            <div class="invalid-feedback">
                                                Introduce un número de celular válido
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom05" class="form-label">Teléfono particular</label>
                                            <input type="number" class="form-control" name="home_number" id="home_number" required>
                                            <div class="invalid-feedback">
                                                Introduce un número particular válido
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom05" class="form-label">Teléfono de contacto</label>
                                            <input type="number" class="form-control" name="contact_number" id="contact_number" required>
                                            <div class="invalid-feedback">
                                                Introduce un número de contacto válido
                                            </div>
                                        </div>
                                        <div></div>
                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label form-spacing">Datos Médicos</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom05" class="form-label">Cédula Profesional</label>
                                            <input type="number" class="form-control" name="license" id="license" required>
                                            <div class="invalid-feedback">
                                                Introduce un número de cédula válido
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom05" class="form-label">Institución de procedencia</label>
                                            <input type="text" class="form-control" name="college" id="college" required>
                                            <div class="invalid-feedback">
                                                Introduce una institución de procedencia válida
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="validationCustom04" class="form-label">Especialidad</label>
                                            <select class="form-control" name="specialty" id="specialty" required>
                                                <option selected disabled value="">Especialidad</option>
                                                <?php
                                                while ($row = mysqli_fetch_object($list_specialty)) {
                                                    $idSpecialty = $row->idSpecialty;
                                                    $specialty = $row->specialty;
                                                ?>
                                                    <option value="<?php echo $idSpecialty; ?>"><?php echo $specialty ?></option>

                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Introduce una especialidad
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom05" class="form-label">Salario</label>
                                            <input type="number" class="form-control" name="salary" id="salary" required>
                                            <div class="invalid-feedback">
                                                Introduce un número de cédula válido
                                            </div>
                                        </div>
                                        <div class="col-12 m-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button class="btn btn-primary" name="createDoctor" type="submit">Registrar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>







                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CLJ Clinic 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>
<script>
    $(document).ready(function() {
            $('#addMedic').on('click', function() {
                $('#addMedicModal').modal('show')

            })
        }

    )
</script>
<script>
    $(document).ready(function() {
            $('.deleteDoctor').on('click', function() {
                $('#deleteDoctorModal').modal('show')
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#delDoctorID').val(data[0]);
            })
        }

    )
</script>
<script>
    $(document).ready(function() {
            $('.updateDoctor').on('click', function() {
                $('#updateDoctorModal').modal('show')
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#updDoctorID').val(data[0]);
                $('#upd_name').val(data[1]);
                $('#upd_last_name').val(data[2]);
                $('#upd_cel_number').val(data[7]);

            })
        }

    )
</script>

<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</html>