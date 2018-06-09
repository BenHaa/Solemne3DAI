<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once '../dao/SolicitudDaoImpl.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>
        <link rel="stylesheet" href="../css/style/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        $lista = SolicitudDaoImpl::listarSolicitudes();
        ?>


        <table border="1"  class="table table-striped">
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
                        <td><?php echo $value->get   ?> </td>
                        <td><?php     ?> </td>
                        <td><?php     ?> </td>
                        <td></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>





    </body>
</html>
