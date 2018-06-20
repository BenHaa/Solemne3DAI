<?php
session_start();
include_once '../dao/ListasPostulanteDaoImp.php';
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

        <meta charset="UTF-8">


        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Bienvenido</title>

        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/bootstrap.js"></script>
        <script src="../assets/js/light-bootstrap-dashboard.js"></script>
        <script src="../css/js/jquery.rut.js"></script>
        <script src="../css/js/jquery-ui.js"></script>


        <style>
            .form-control{
                height: 33px;
            }

            .scrollable-menu{
                height: auto;
                max-height: 200px;
                overflow-x: hidden;
            }

        </style>

        <script>
            $(document).ready(function () {
                var availableTags = new Array();
                $(function () {
                    $('#txtComuna').bind("keyup", function (event) {
                        var data = {'txtComuna': $('#txtComuna').val()};

                        $.getJSON('../server/probandoAutocomplete.php', data, function (res, est, jqXHR) {

                            availableTags.length = 0;

                            $.each(res, function (i, item) {
                                availableTags[i] = item;

                            });
                        });
                    });
                });

                $("#txtComuna").autocomplete({
                    source: availableTags,
                    minLength: 1
                });
            });
        </script>

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
                                <p>Solicitar Crédito</p>
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
                                    <a class="navbar-brand" href="RegistrarUsuario.php">Realizar Solicitud</a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>




                <div class="content col-xs-offset-1" style="margin-left: 130px;">
                    <div class="container-fluid">
                        <br>
                        <br>

                        <form action=../server/FormularioPreAprobacion.php method="POST">
                            <div class="row">

                                <table border="0" class="table-bordered table-hover table-striped" style="width: 790px; margin-left: 15px;" >
                                  
                                    <tbody>
                                    <thead>
                                        <tr>
                                            <th colspan="4" style="text-align: center"> Registrar</th>

                                        </tr>
                                    </thead>

                                    <tr >
                                        <td>&nbsp;Rut</td>
                                        <td><input type="text" name="txtRut" id="txtRut" value="19.360.198-7" class="form-control" maxlength="12" /></td>
                                        <td> &nbsp; Telefono</td>
                                        <td><input type="text" name="txtTelefono" value="6034690" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Nombre</td>
                                        <td><input type="text" name="txtNombre" value="nacho" class="form-control" /></td>
                                        <td> &nbsp; Email</td>
                                        <td><input type="email" name="txtEmail" value="nacho@gmail.com" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Apellido Paterno</td>
                                        <td><input type="text" name="txtApPat" value="perez" class="form-control" /></td>
                                        <td> &nbsp; Direccion</td>
                                        <td><input type="text" name="txtDireccion" value="loquesea#381" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Apellido Materno</td>
                                        <td><input type="text" name="txtApMat" value="cumillaf" class="form-control"/></td>
                                        <td> &nbsp;&nbsp;Comuna</td>
                                        <td>
                                            <input type="text" name="txtComuna" id="txtComuna" value="Santiago" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Fecha Nacimineto</td>
                                        <td><input type="date" name="fechaNac" value="" class="form-control" /></td>
                                        <td> &nbsp;&nbsp;Educacion</td>
                                        <td>
                                            <select name="cmbEducacion">
                                                <?php
                                                $listaNivelEducacion = ListasPostulanteDaoImp::listarEducacion();
                                                foreach ($listaNivelEducacion as $value) {
                                                    echo "<option>" . $value . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Sexo</td>
                                        <td>

                                            <select name="cmbSexo">
                                                <?php
                                                $listaSexo = ListasPostulanteDaoImp::listarSexo();
                                                foreach ($listaSexo as $value) {
                                                    echo "<option>" . $value . "</option>";
                                                }
                                                ?>
                                            </select>

                                        </td>
                                        <td>&nbsp;&nbsp;Renta</td>
                                        <td>
                                            <select name="cmbRenta">
                                                <?php
                                                $listaRenta = ListasPostulanteDaoImp::listarRenta();
                                                foreach ($listaRenta as $value) {
                                                    echo "<option>" . $value . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Estado Civil</td>
                                        <td>

                                            <select name="cmbEstadoCivil">

                                                <?php
                                                $listaEstadoCivil = ListasPostulanteDaoImp::listarEstadoCivil();
                                                foreach ($listaEstadoCivil as $value) {
                                                    echo "<option>" . $value . "</option>";
                                                }
                                                ?>


                                            </select>

                                        </td>
                                        <td>&nbsp;&nbsp;Sueldo Liquido</td>
                                        <td><input type="number" name="txtSueldo" value="650000" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Hijos</td>
                                        <td><input type="checkbox" name="chkHijos" id="chkHijos" value="ON"/>&nbsp;

                                            <input name="txtHijos" id="txtHijos" min="0" type="number" style="width: 50px"   value="2" disabled class="form-control"/>
                                        </td>
                                        <td>&nbsp;&nbsp;Padece alguna enfermedad crónica</td>
                                        <td>
                                            &nbsp; <input type="checkbox" name="chkEnfermedad" value="ON" />&nbsp; Si





                                        </td>
                                    </tr>
                                    </tbody>


                                    <script>
                                        $('#txtRut').rut({formatOn: 'keyup'});

                                        $('#chkHijos').click(function () {

                                            if ($('#txtHijos').prop('disabled')) {
                                                $('#txtHijos').prop('disabled', false);

                                            } else {
                                                $('#txtHijos').prop('disabled', true);
                                                $('#txtHijos').val('');
                                            }

                                        });

                                    </script>
                                </table>

                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 330px;">Postular</button>
                        </form>

                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">

                    </div>
                </footer>

            </div>
        </div>

    </body>



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
