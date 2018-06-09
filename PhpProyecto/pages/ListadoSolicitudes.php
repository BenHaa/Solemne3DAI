<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once '../dao/SolicitudDaoImpl.php';
include_once '../dao/EstadoDaoImpl.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style/bootstrap.css">
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/bootstrap.js"></script>
        <script src="../css/js/jquery.rut.js"></script>

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
                <?php foreach ($lista as $value) { ?>
                    <tr>
                        <td><?php echo SolicitudDaoImpl::IntToString($value->getIdPostulante()); ?> </td>
                        <td><?php echo SolicitudDaoImpl::NombrePorId($value->getIdPostulante()); ?> </td>
                        <td><?php echo EstadoDaoImpl::IntToString($value->getIdEstado()); ?> </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVer<?php echo $value->getIdSolicitud();?>">
                                Ver
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalVer<?php echo $value->getIdSolicitud();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
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

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar<?php echo $value->getIdSolicitud();?>">
                                Editar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalEditar<?php echo $value->getIdSolicitud();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



                            <input type="submit" value="Eliminar" name="btnEliminar"  class="btn btn-primary"/>





                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>




    </body>
</html>
