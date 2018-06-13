<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
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
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>
        <link rel="stylesheet" href="../css/style/bootstrap.css">
        <script src="../css/js/bootstrap.js"></script>

        <title></title>
    </head>
    <body>
        <?php
        $lista = SolicitudDaoImpl::listarSolicitudes();
        $contador = 0;
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
                foreach ($lista as $value) {
                    $contador++;
                    //Se lee el objeto postulante a partir del id para desplegar sus datos en el modal de detalle
                    $dtoPostulante = PostulanteDaoImpl::LeerObjeto($value->getIdPostulante());

                    //Se lee el objeto persona a partir del id de postulante para desplegar sus datos en el modal de detalle
                    $dtoPersona = PersonaDaoImpl::LeerObjeto($dtoPostulante->getRutPersona());
                    ?>
                    <tr>
                        <td><?php echo SolicitudDaoImpl::IntToString($value->getIdPostulante()); ?> </td>
                        <td><?php echo SolicitudDaoImpl::NombrePorId($value->getIdPostulante()); ?> </td>
                        <td><?php echo EstadoDaoImpl::IntToString($value->getIdEstado()); ?> </td>
                        <td>
                            <!-- Button trigger modal Ver Detalle -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVer<?php echo $value->getIdSolicitud(); ?>">
                                Ver
                            </button>

                            <!-- Modal Ver Detalle-->
                            <div class="modal fade " id="modalVer<?php echo $value->getIdSolicitud(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar<?php echo $value->getIdSolicitud(); ?>">
                                Editar
                            </button>

                            <!-- Modal Editar Solicitud -->
                            <div class="modal fade" id="modalEditar<?php echo $value->getIdSolicitud(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" >Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <input type="submit" value="Eliminar" name="btnEliminar"  id="btnEliminar<?php echo $value->getIdSolicitud(); ?>" class="btn btn-primary"/>


                            <script>
                                $('#btnEliminar<?php echo $value->getIdSolicitud(); ?>').click(function () {
                                    $.ajax({
                                        data: {"idSolicitud": <?php echo $contador; ?>},
                                        method: "POST",
                                        url: '../server/FPAEliminarSolicitud.php',
                                        success: function () {
                                            if (confirm("Se ha rechazado la solicitud,  ¿desea continuar?")) {
                                        
                                                $('#btnEliminar<?php echo $value->getIdSolicitud(); ?>').closest('tr').fadeOut();

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
