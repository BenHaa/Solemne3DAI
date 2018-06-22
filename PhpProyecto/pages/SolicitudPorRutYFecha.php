<?php
include_once '../dao/ListasPostulanteDaoImp.php';
include_once '../dao/SolicitudDaoImpl.php';
include_once '../dao/EstadoDaoImpl.php';
include_once '../dao/PostulanteDaoImpl.php';
include_once '../dao/PersonaDaoImpl.php';
include_once '../dto/PersonaDto.php';
include_once '../dto/PostulanteDto.php';


include_once '../dao/SexoDaoImpl.php';
include_once '../dao/ComunaDaoImpl.php';
include_once '../dao/EducacionDaoImpl.php';
include_once '../dao/EstadoCivilDaoImpl.php';
include_once '../dao/RentaDaoImpl.php';
session_start();
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

            td, th{
                padding: 7px;
            }

            .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
                border: 2px solid #8c8b8b; 
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
                        <a href="Loginv2.php" class="simple-text">
                            INICIAR SESION
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="active">
                            <a href="postulanteHome.php">
                                <i class="pe-7s-bell"></i>
                                <p>Ver Solicitudes</p>
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
                        <div class="row" style="display: inline-block;" >

                            <!--style="display: inline-block"-->

                            <form method="POST" action="../server/BuscarPorRut.php">
                                <table border="1" id="BuscarPorRut" style="display: inline-block;" class="table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align: center; "> Buscar por Rut</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td style="padding: 7px;">Rut</td>
                                            <td style="padding: 7px;"><input type="text" name="txtRut" value=""  class="form-control"/></td>

                                        </tr>
                                        <tr>
                                            <td  colspan="2" style="text-align: center; padding: 7px;">   <input type="submit" class="btn btn-primary" value="Buscar" name="btnBuscarPorRut" id="btnBuscarPorRut"/></td>    
                                        </tr>
                                    </tbody>

                                </table>
                            </form>    



                            <form method="POST" action="../server/BuscarPorFecha.php">
                                <table border="1" id="buscarPorFecha" style="display: inline-block;  margin-top: -145px;"  class="col-xs-offset-8 table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align: center;"> Buscar por Fecha</th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>&nbsp; Desde &nbsp;   <input type="date"  class="form-control" name="clnDesde"></td>
                                            <td>&nbsp; Hasta &nbsp; <input type="date"  class="form-control" name="clnHasta" value="" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"style="text-align: center;"> <input type="submit"  class="btn btn-primary" value="Buscar" id="btnBuscarPorFecha" name="btnBuscarPorFecha" ></td>
                                        </tr>
                                    </tbody>

                                </table>

                            </form> 

                            <script>
                                $(document).ready(function () {
                                    $('#btnBuscarPorRut').click(function () {

<?php
if (isset($_SESSION["SolicitudesPorRut"])) {

    $lista = $_SESSION["SolicitudesPorRut"];
}
?>

                                    });




                                    $('#btnBuscarPorFecha').click(function () {

<?php
if (isset($_SESSION["SolicitudesPorFecha"])) {
    $lista = $_SESSION["SolicitudesPorFecha"];
}
?>

                                    });

                                });


                            </script>

                            <br>
                            <br>
                            <br>
                            <br>




                            <?php
                            if (!empty($lista)) {
                                foreach ($lista as $id) {

                                    //Se lee el objeto postulante a partir del id para desplegar sus datos en el modal de detalle
                                    $dtoPostulante = PostulanteDaoImpl::LeerObjeto($id->getIdPostulante());

                                    //Se lee el objeto persona a partir del id de postulante para desplegar sus datos en el modal de detalle
                                    $dtoPersona = PersonaDaoImpl::LeerObjeto($dtoPostulante->getRutPersona());
                                    ?>

                                    <table border="1" style="display: inline-block;     margin-left: 20%;" class="table-bordered table-hover table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Rut</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                                <th>Seleccionar</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td><?php echo SolicitudDaoImpl::IntToString($id->getIdPostulante()); ?> </td>
                                                <td><?php echo SolicitudDaoImpl::NombrePorId($id->getIdPostulante()); ?> </td>
                                                <td><?php echo EstadoDaoImpl::IntToString($id->getIdEstado()); ?> </td>
                                                <td width="320px;">
                                                    <!-- Button trigger modal Ver Detalle -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVer<?php echo $id->getIdSolicitud(); ?>">
                                                        Ver
                                                    </button>

                                                    <!-- Button trigger modal Editar Solicitud -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar<?php echo $id->getIdSolicitud(); ?>">
                                                        Editar
                                                    </button>

                                                    <input type="submit" value="Eliminar" name="btnEliminar"  id="btnEliminar<?php echo $id->getIdSolicitud(); ?>" class="btn btn-primary" />

                                                    <script>
                                                        $('#btnEliminar<?php echo $id->getIdSolicitud(); ?>').click(function () {
                                                            $.ajax({
                                                                data: {"idSolicitud": <?php echo $id->getIdSolicitud(); ?>},
                                                                method: "POST",
                                                                url: '../server/FPAEliminarSolicitud.php',
                                                                success: function () {
                                                                    if (confirm("¿Realmente desea eliminar la solicitud?")) {

                                                                        $('#btnEliminar<?php echo $id->getIdSolicitud(); ?>').closest('tr').fadeOut();
                                                                    }
                                                                }
                                                            });
                                                        });

                                                    </script>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>


                                </div>


                                <footer class="footer">
                                    <div class="container-fluid">

                                    </div>
                                </footer>

                            </div>
                        </div>
                    </div>



                    <!-- Modal Ver Detalle-->
                    <div class="modal fade " id="modalVer<?php echo $id->getIdSolicitud(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="margin: 3.75rem auto;">
                            <div class="modal-content modal-lg" style="width: 700px; margin-left: -80px;
                                 ">
                                <div class="modal-header">
                                    <h5 class="modal-title"> Ficha Postulante</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" >

                                    <table border="1" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Rut: &nbsp; <?php echo $dtoPersona->getRut(); ?> </td>
                                                <td style="width: 50%; height: 40px;">&nbsp;Teléfono: <?php echo $dtoPostulante->getTelefono(); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Nombre: <?php echo $dtoPersona->getNombre(); ?></td>
                                                <td style="width: 50%; height: 40px;">&nbsp;E-mail:  <?php echo $dtoPostulante->getEmail(); ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Apellido Paterno:  <?php echo $dtoPersona->getApellido_pat(); ?></td>
                                                <td style="width: 50%; height: 40px;">&nbsp;Dirección:  <?php echo $dtoPostulante->getDireccion(); ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Apellido Materno:  <?php echo $dtoPersona->getApellido_mat(); ?></td>
                                                <td style="width: 50%; height: 40px;">&nbsp;Comuna:  <?php echo ComunaDaoImpl::IntToString($dtoPostulante->getIdComuna()); ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Fecha de nacimiento:  <?php echo $dtoPersona->getFecha_nacimiento(); ?></td>
                                                <td style="width: 50%; height: 40px;">&nbsp;Educación:  <?php echo EducacionDaoImpl::IntToString($dtoPostulante->getIdNivelEducacion()); ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Sexo:  <?php echo SexoDaoImpl::IntToString($dtoPersona->getSexo()); ?></td>
                                                <td style="width: 50%; height: 40px;">&nbsp;Tipo de renta:  <?php echo RentaDaoImpl::IntToString($dtoPostulante->getRenta()); ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Estado civil:  <?php echo EstadoCivilDaoImpl::IntToString($dtoPostulante->getEstadoCivil()); ?></td>
                                                <td style="width: 50%; height: 40px;">&nbsp;Sueldo líquido:  <?php echo $dtoPostulante->getSueldoLiq(); ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 50%; height: 40px;">&nbsp;Hijos: <?php echo $dtoPostulante->getHijos(); ?> </td>
                                                <td style="width: 50%; height: 40px;">&nbsp;Padece alguna enfermedad crónica: <?php echo ($dtoPostulante->getEnfermedadCronica()) ? "Si " : "No" ?></td> 
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Editar Solicitud -->
                    <div class="modal fade" id="modalEditar<?php echo $id->getIdSolicitud(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-lg" >
                                <div class="modal-header">
                                    <h5 class="modal-title" >Editar estado</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="../server/ActualizarSolicitud.php" method="POST">
                                    <div class="modal-body">

                                        <div class="widget">

                                            <fieldset>

                                                <legend>Solicitud N° <?php echo $id->getIdSolicitud(); ?> </legend> 

                                                <label for="radio-1">Pendiente</label>
                                                <input type="radio" name="radio-1" id="radio-1" value="2" >

                                                <label for="radio-2">Aprobar</label>
                                                <input type="radio" name="radio-1" id="radio-2" value="1">
                                                <label for="radio-3">Rechazar</label>
                                                <input type="radio" name="radio-1" id="radio-3" value="3">
                                            </fieldset>

                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit " class="btn btn-primary">Save changes</button>
                                    </div>
                                    <input type="hidden"  name="idSolicitud" value="<?php echo $id->getIdSolicitud(); ?>">
                                </form>
                            </div>
                        </div>
                    </div>


                <?php } ?>
            <?php } ?>

        </div>
    </body>



</html>
