<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

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
?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style/bootstrap.css">
        <link rel="stylesheet" href="../css/js/jquery-ui.css">    
        <link rel="stylesheet" href="../css/js/jquery-ui.theme.css">    
        <link rel="stylesheet" href="../css/js/jquery-ui.structure.css">

        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery-ui.js"></script>
        <script src="../css/js/bootstrap.js"></script>


        <script>
            $(function () {
                $("fieldset").controlgroup();
            });
        </script>



        <title></title>
    </head>
    <body>
        <?php
        $lista = SolicitudDaoImpl::listarSolicitudes();

        ?>

        <table border="1" >
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $id) {
                   
                    //Se lee el objeto postulante a partir del id para desplegar sus datos en el modal de detalle
                    $dtoPostulante = PostulanteDaoImpl::LeerObjeto($id->getIdPostulante());

                    //Se lee el objeto persona a partir del id de postulante para desplegar sus datos en el modal de detalle
                    $dtoPersona = PersonaDaoImpl::LeerObjeto($dtoPostulante->getRutPersona());
                    ?>
                    <tr>
                        <td><?php echo SolicitudDaoImpl::IntToString($id->getIdPostulante()); ?> </td>
                        <td><?php echo SolicitudDaoImpl::NombrePorId($id->getIdPostulante()); ?> </td>
                        <td><?php echo EstadoDaoImpl::IntToString($id->getIdEstado()); ?> </td>
                        <td>
                            <!-- Button trigger modal Ver Detalle -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVer<?php echo $id->getIdSolicitud(); ?>">
                                Ver
                            </button>

                            <!-- Modal Ver Detalle-->
                            <div class="modal fade " id="modalVer<?php echo $id->getIdSolicitud(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="margin: 3.75rem auto;">
                                    <div class="modal-content modal-lg" style="width: 700px; margin-left: -80px;
                                         ">
                                        <div class="modal-header">
                                            <h5 class="modal-title"  > Ficha Postulante</h5>
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




                            <!-- Button trigger modal Editar Solicitud -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar<?php echo $id->getIdSolicitud(); ?>">
                                Editar
                            </button>

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



                            <input type="submit" value="Eliminar" name="btnEliminar"  id="btnEliminar<?php echo $id->getIdSolicitud(); ?>" class="btn btn-primary"/>


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
                <?php } ?>
            </tbody>
        </table>




    </body>
</html>
