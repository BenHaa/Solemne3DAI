<?php
include_once '../dao/ListasPostulanteDaoImp.php';
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



        <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
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

            td, th {
                padding: 7px;
            }

            input[type=checkbox]
            {
                /* Double-sized Checkboxes */
                -ms-transform: scale(2); /* IE */
                -moz-transform: scale(2); /* FF */
                -webkit-transform: scale(2); /* Safari and Chrome */
                -o-transform: scale(2); /* Opera */
                padding: 10px;
            }


        </style>

        <script>
            $(document).ready(function () {
                var availableTags = new Array();
                $(function () {
                    $('#txtComuna').bind("keyup", function (event) {
                        var data = {'txtComuna': $('#txtComuna').val()};

                        $.getJSON('../server/Autocomplete.php', data, function (res, est, jqXHR) {
                            console.log(res);
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
            <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a class="simple-text" href="postulanteHome.php">
                            <?php
                            $dto = $_SESSION["persona"];
                            echo $dto;
                            ?>
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="active">
                            <a href="FormularioPreAprobacion.php">
                                <i class="pe-7s-note2"></i>
                                <p>Solicitar Crédito</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="estadoSolicitud.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Estado Solicitud</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">

                    <div class="container-fluid">
                        <div class="navbar-header">

                            <a class="navbar-brand" href="#">Solicitar Crédito</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">

                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="../server/CerrarSesion.php">
                                        <p>Log out</p>
                                    </a>
                                </li>
                                
                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content col-xs-offset-1" style="margin-left: 130px;">
                    <div class="container-fluid">
                        <br>

                        <form action=../server/FormularioPreAprobacion.php method="POST">
                            <div class="row">

                                <table border="0" class="table-bordered table-hover table-striped" style="width: 790px;" >

                                    <tbody>
                                    <thead>
                                        <tr>
                                            <th colspan="4" style="text-align: center"> Registrar</th>

                                        </tr>
                                    </thead>

                                    <tr >
                                        <td>&nbsp;Rut</td>
                                        <td><input type="text" name="txtRut" id="txtRut" value="<?php echo $_SESSION["rut"]; ?>" class="form-control" maxlength="12" disabled/></td>
                                        <td> &nbsp; Telefono</td>
                                        <td><input type="text" name="txtTelefono" value="6034690" class="form-control"  required/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Nombre</td>
                                        <td><input type="text" name="txtNombre" value="<?php echo $_SESSION["nombre"]; ?>" class="form-control" disabled/></td>
                                        <td> &nbsp; Email</td>
                                        <td><input type="email" name="txtEmail" value="nacho@gmail.com" class="form-control" required /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Apellido Paterno</td>
                                        <td><input type="text" name="txtApPat" value="<?php echo $_SESSION["apellidoP"]; ?>" class="form-control" disabled/></td>
                                        <td> &nbsp; Direccion</td>
                                        <td><input type="text" name="txtDireccion" value="loquesea#381" class="form-control" required/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Apellido Materno</td>
                                        <td><input type="text" name="txtApMat" value="<?php echo $_SESSION["apellidoM"]; ?>" class="form-control" disabled/></td>
                                        <td> &nbsp;&nbsp;Comuna</td>
                                        <td>
                                            <input type="text" name="txtComuna" id="txtComuna" value="Santiago" class="form-control" placeholder="Autcompletado Ajax" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Fecha Nacimiento</td>
                                        <td><input type="date" name="fechaNac" value="" class="form-control" required /></td>
                                        <td> &nbsp;&nbsp;Educacion</td>
                                        <td>
                                            <select name="cmbEducacion" class="form-control">
                                                <?php
                                                $listaNivelEducacion = ListasPostulanteDaoImp::listarEducacion();
                                                echo "<option>" . "Seleccionar" . "</option>";
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

                                            <select name="cmbSexo" class="form-control">
                                                <?php
                                                $listaSexo = ListasPostulanteDaoImp::listarSexo();
                                                //Opción por default
                                                echo "<option>" . "Seleccionar" . "</option>";
                                                foreach ($listaSexo as $value) {
                                                    if ($value != "No Indica") {
                                                        echo "<option>" . $value . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>


                                        </td>
                                        <td>&nbsp;&nbsp;Renta</td>
                                        <td>
                                            <select name="cmbRenta" class="form-control">
                                                <?php
                                                $listaRenta = ListasPostulanteDaoImp::listarRenta();
                                                echo "<option>" . "Seleccionar" . "</option>";
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

                                            <select name="cmbEstadoCivil" class="form-control">
                                                <?php
                                                $listaEstadoCivil = ListasPostulanteDaoImp::listarEstadoCivil();
                                                echo "<option>" . "Seleccionar" . "</option>";
                                                foreach ($listaEstadoCivil as $value) {
                                                    echo "<option>" . $value . "</option>";
                                                }
                                                ?>
                                            </select>


                                        </td>
                                        <td>&nbsp;&nbsp;Sueldo Liquido</td>
                                        <td><input type="number" name="txtSueldo" value="650000" class="form-control" required /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Hijos</td>
                                        <td>
                                            <div>
                                                &nbsp;<input type="checkbox" name="chkHijos" id="chkHijos" value="ON" style="display: inline-block;">  &nbsp;&nbsp;&nbsp;
                                               <input name="txtHijos" id="txtHijos" min="0" type="number" style="width: 50px;   display: inline-block;"   value="2" disabled class="form-control"/>
                                            </div>
                                        </td>
                                        <td>&nbsp;&nbsp;Padece alguna enfermedad crónica</td>
                                        <td>
                                            &nbsp; <input type="checkbox" name="chkEnfermedad" value="ON" />&nbsp; &nbsp; Si
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
