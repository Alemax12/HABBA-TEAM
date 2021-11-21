<?php

require './database.php';

$sql = "SELECT * FROM ciudad AS c  
        INNER JOIN pais AS p ON (c.id_pais = p.id_pais)
        ORDER BY id_ciudad";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}

//ciudad
$sql = "SELECT * FROM pais
     ORDER BY id_pais";
$result_pais = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$pais = array();
while ($fila = $result_pais->fetch_assoc()) {
    $pais[] = $fila;
}

$conexion->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Healthy Citizen</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.html">Healthy Citizen</a>
        <!--<a class="navbar-brand ps-3" href="miembros.html">miembros</a>-->
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!--Botones Login y SingUp-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="px-xxl-0 d-inline-block bg-info p-3 mb-2 bg-transparent text-dark">
                <a href="../login.html" class="btn btn-dark">Log in</a>
                <a href="../register.html" class="btn btn-dark">Sign up</a>
            </div>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main</div>
                        <a class="nav-link" href="../index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <div class="sb-sidenav-menu-heading">Information</div>

                        <!--Sobre nosotros nav collapsed button-->
                        <a class="nav-link" href="../aboutus.html">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-heart">
                                </i>
                            </div>
                            About us
                        </a>
                        <!--Pages btn 2 en la lista-->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-code"></i></div>
                            Developement
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <!--Herramientas-->
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                                    Used Tools
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="https://trello.com/b/7dudAdSS/team-haba">Trello</a>
                                        <a class="nav-link" href="https://github.com/Alemax12/HABBA-TEAM">GitHub</a>
                                    </nav>
                                </div>

                                <!--Integrantes-->
                                <a class="nav-link" href="../members.html">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-friends">
                                        </i>
                                    </div>
                                    Members
                                </a>

                                <!--Clientes-->
                                <a class="nav-link" href="./cliente.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Client
                                </a>

                                <!--Empleados-->
                                <a class="nav-link" href="./empleado.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Employee
                                </a>

                                <!--Contrato-->
                                <a class="nav-link" href="./contrato.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Contract
                                </a>

                                <!--Roles-->
                                <a class="nav-link" href="./registros.html">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Role
                                </a>

                                <!--País-->
                                <a class="nav-link" href="./registros.html">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Country
                                </a>

                                <!--Ciudad-->
                                <a class="nav-link" href="./ciudad.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    City
                                </a>

                                <!--Sede-->
                                <a class="nav-link" href="./registros.html">
                                    <div class="sb-nav-link-icon">
                                    <i class="fas fa-bars">    
                                    </i>
                                    </div>
                                    Headquarters
                                </a>

                                <!--Inventario-->
                                <a class="nav-link" href="./registros.html">
                                    <div class="sb-nav-link-icon">
                                    <i class="fas fa-bars">    
                                    </i>
                                    </div>
                                    Headquarters Inventory
                                </a>

                                <!--Insumos-->
                                <a class="nav-link" href="./registros.html">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Supplies
                                </a>

                                <!--MAteria Prima-->
                                <a class="nav-link" href="./registros.html">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Raw Material
                                </a>

                                <!--Procedimiento-->
                                <a class="nav-link" href="./registros.html">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">
                                        </i>
                                    </div>
                                    Procedures
                                </a>

                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div id="layoutSidenav_content">

            <!--Carousel-->

            <style>
                .carousel-item {
                    height: 10rem;
                    background: rgb(206, 203, 203);
                    position: relative;
                }

                .contenedor {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    padding-bottom: 10px;
                    padding-left: 50px;
                }

                .btnOpt2 {
                    padding-left: 50px;
                }
            </style>

            <div class="--Carousel--">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8"><h1>City</h1>
                            </div>
                            <div class="col-6 col-md-4"><img src="../imgC/logo.png" class="rounded" width="200"></div>
                        </div>
                    </div>


                    <br>
                    <div class="card">
                        <div class="card-header text-white bg-dark">
                            Information
                        </div>

                        <div class="card-body">
                            <button type="button" class="btn btn-secondary" id="nuevo">New</button>
                            <div id="formulario">

                                <form class="row g-3" role="form" id="form1">

                                    <div class="form-group col-3 div_id">
                                        <label>Contract ID:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="id" id="inputID" placeholder="Enter number" value="">
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Employees:</label>
                                        <select class="form-control" name="pai" id="inputPai">
                                            <option value="0">Select:</option>
                                            <?php foreach ($pais as $fila) { ?>
                                                <option value="<?php echo $fila['id_pais'] ?>"> <?php echo $fila['nom_pais'] ?> </option>;
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Contract Salary:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="nom" id="inputNom" placeholder="Enter salary" value="">
                                    </div>

                                </form>

                                <div>
                                    <br>
                                    <button type="button" id="save" class="btn btn-secondary" data-tag="">Update</button>
                                    <button type="button" id="cancel" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>

                            <br><br>

                            <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>City ID</th>
                                        <th>Country</th>
                                        <th>City Name</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php foreach ($listado as $fila) { ?>
                                            <td><?php echo $fila['id_ciudad'] ?> </td>
                                            <td><?php echo utf8_encode($fila['nom_pais']) ?> </td>
                                            <td><?php echo utf8_encode($fila['nom_ciudad']) ?> </td>

                                            <td>
                                                <button class="btn btn-success btn-sm edit" data-id="<?php echo $fila['id_ciudad'] ?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm delete" data-id="<?php echo $fila['id_ciudad'] ?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!--INICIO-->


            </div>
            <!--FIN-->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#tabla").DataTable();
        });
    </script>
    <script type="text/javascript" src="../js/funcionesCiudad.js"></script>
    <script type="text/javascript">
        $(document).ready(operaciones)
    </script>



</body>

</html>