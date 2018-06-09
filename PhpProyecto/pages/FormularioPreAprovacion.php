<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>

        <link rel="stylesheet" href="../css/style/bootstrap.css">
        <title>Formulario Solicitud</title>
    </head>
    <body>
        <div class="container">
            <div class="row"><br></div>
            <form method="POST">
                <div class="row centered">

                    <table border="0" class="table-borderless">
                        <tbody>
                            <tr>
                                <td>Rut</td>
                                <td><input type="text" name="txtRut" value="" />&nbsp;-
                                    <input type="text" name="txtDV" value="" size="1"/>
                                </td>
                                <td>Telefono</td>
                                <td><input type="text" name="txtTelefono" value="" /></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="txtNombre" value="" /></td>
                                <td>Email</td>
                                <td><input type="email" name="txtEmail" value="" /></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno</td>
                                <td><input type="text" name="txtApPat" value="" /></td>
                                <td>Direccion</td>
                                <td><input type="text" name="txtDireccion" value="" /></td>
                            </tr>
                            <tr>
                                <td>Apellido Materno</td>
                                <td><input type="text" name="txtApMat" value="" /></td>
                                <td>Comuna</td>
                                <td><!-- AQUI VA EL DROP DOWN DE COMUNAS DE BOOTSTRAP -->

                                </td>
                            </tr>
                            <tr>
                                <td>Fecha Nacimineto</td>
                                <td><input type="date" name="fechaNac" value="" /></td>
                                <td>Educacion</td>
                                <td>
                                    <select name="cmbEducacion">
                                        <?php
                                        include_once './../dao/ListasPostulanteDaoImp.php';
                                        header('Content-Type: text/html; charset=utf-8');
                                        $lista = ListasPostulanteDaoImp::listarEducacion();
                                        foreach ($lista as $value) {
                                            echo "<option>" . $value . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Sexo</td>
                                <td>
                                    <select name="cmbSexo">
                                        <?php
                                        include_once './../dao/ListasPostulanteDaoImp.php';
                                        header('Content-Type: text/html; charset=utf-8');
                                        $lista = ListasPostulanteDaoImp::listarEducacion();
                                        foreach ($lista as $value) {
                                            echo "<option>" . $value . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>Renta</td>
                                <td>
                                    <select name="cmbRenta">
                                        <?php
                                        include_once './../dao/ListasPostulanteDaoImp.php';
                                        header('Content-Type: text/html; charset=utf-8');
                                        $lista = ListasPostulanteDaoImp::listarRenta();
                                        foreach ($lista as $value) {
                                            echo "<option>" . $value . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Estado Civil</td>
                                <td>
                                    <select name="cmbEstadoCivil">
                                        <?php
                                        include_once './../dao/ListasPostulanteDaoImp.php';
                                        header('Content-Type: text/html; charset=utf-8');
                                        $lista = ListasPostulanteDaoImp::listarEstadoCivil();
                                        foreach ($lista as $value) {
                                            echo "<option>" . $value . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>Sueldo Liquido</td>
                                <td><input type="number" name="txtSueldo" value="" /></td>
                            </tr>
                            <tr>
                                <td>Hijos</td>
                                <td><input type="checkbox" name="chkHijos" value="ON"/>&nbsp;
                                    Cantidad <input name="txtHijos" min="0" type="number" style="width: 50px" disabled=""/>
                                </td>
                                <td>Padece alguna enfermedad crónica</td>
                                <td>
                                    <input type="checkbox" name="chkenfermedad" value="ON" />&nbsp;
                                    Cual <input type="text" name="txtEnfermedad" value="" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" class="btn btn-primary" value="Postular">

            </form>
        </div>
    </body>
</html>
