<?php
session_start();
//echo "Perfil ".$_SESSION["perfil"];
//if($_SESSION["perfil"]=='2'){
//    echo "<script>alert('bien')</script>";
//}else{
//    header('Location: ../pages/perfil1.php');
//}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta charset="UTF-8">
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>

        <link rel="stylesheet" href="../css/style/bootstrap.css">


        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Bienvenido</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="Loginv2.php" class="simple-text">
                            INICIAR SESION
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="active">
                            <a href="postulanteHome.php">
                                <i class="pe-7s-graph"></i>
                                <p>REGISTRAR USUARIO</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a class="navbar-brand" href="RegistrarUsuario.php">registrar usuario</a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                            if (isset($_SESSION["exito"])) {
                                if ($_SESSION["exito"] == true) {
                                    ?>
                                    <script> alert('Se registró el usuario correctamente');</script>    
                                <?php } else { ?>
                                    <script> alert('No se registró el usuario');</script>    
                                    <?php
                                }
                                unset($_SESSION["exito"]); //Se borra esta variable para que no despliegue la alerta cada vez que se quiera volver a esta página
                            }
                            ?>

                            <form action="../server/RegistrarUsuario.php" method="POST">
                                <table border="1" class="table" >
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align: center;">Formulario de Registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Rut</td>
                                            <td><input type="text" name="txtRut" id="txtRut" value="19.360.198-7" /></td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td><input type="text" name="txtNombre" value="juan" /></td>
                                        </tr>
                                        <tr>
                                            <td>Apellido Paterno</td>
                                            <td><input type="text" name="txtApPaterno" value="lopez" /></td>
                                        </tr>
                                        <tr>
                                            <td>Apellido Materno</td>
                                            <td><input type="text" name="txtApMaterno" value="garrido" /></td>
                                        </tr>
                                        <tr>
                                            <td>Contraseña</td>
                                            <td><input type="text" name="txtContrasena" value="hola" /></td>
                                        </tr>
                                        <tr>
                                            <td>Repetir Contraseña</td>
                                            <td><input type="text" name="txtContrasena2" value="hola" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <button type="submit" class="btn btn-primary offset-md-2">Grabar</button>
                            </form>

                            <script>
                                $('#txtRut').rut({formatOn: 'keyup'});
                            </script>
                        </div>
                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">

                    </div>
                </footer>

            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

<!--    <script type="text/javascript">
                                $(document).ready(function () {

                                    demo.initChartist();

                                    $.notify({
                                        icon: 'pe-7s-gift',
                                        message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

                                    }, {
                                        type: 'info',
                                        timer: 4000
                                    });

                                });
    </script>-->

</html>
