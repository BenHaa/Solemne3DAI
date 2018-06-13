<?php
include_once '../dao/ListasPostulanteDaoImp.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>
        <script src="../css/js/jquery-ui.js"></script>
        <link rel="stylesheet" href="../css/style/bootstrap.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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


        <title>Formulario Solicitud</title>
    </head>

    <body>
        <div class="container">
            <div class="row"><br></div>
            <form action=../server/FormularioPreAprobacion.php method="POST">
                <div class="row centered">

                    <table border="0" class="table-borderless">
                        <tbody>
                            <tr>
                                <td>Rut</td>
                                <td><input type="text" name="txtRut" id="txtRut" value="19.360.198-7" /></td>
                                <td> &nbsp; Telefono</td>
                                <td><input type="text" name="txtTelefono" value="6034690" /></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="txtNombre" value="nacho" /></td>
                                <td> &nbsp; Email</td>
                                <td><input type="email" name="txtEmail" value="nacho@gmail.com" /></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno</td>
                                <td><input type="text" name="txtApPat" value="perez" /></td>
                                <td> &nbsp; Direccion</td>
                                <td><input type="text" name="txtDireccion" value="loquesea#381" /></td>
                            </tr>
                            <tr>
                                <td>Apellido Materno</td>
                                <td><input type="text" name="txtApMat" value="cumillaf" /></td>
                                <td> &nbsp;&nbsp;Comuna</td>
                                <td>
                                    <input type="text" name="txtComuna" id="txtComuna" value="Santiago" />
                                </td>
                            </tr>
                            <tr>
                                <td>Fecha Nacimineto</td>
                                <td><input type="date" name="fechaNac" value="" /></td>
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
                                <td>&nbsp;&nbsp;Sexo</td>
                                <td>
                                    
                                    <select name="cmbSexo">
                                        <?php
                                        $listaNivelEducacione = ListasPostulanteDaoImp::listarSexo();
                                        foreach ($listaNivelEducacione as $value) {
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
                                <td>Estado Civil</td>
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
                                <td><input type="number" name="txtSueldo" value="650000" /></td>
                            </tr>
                            <tr>
                                <td>Hijos</td>
                                <td><input type="checkbox" name="chkHijos" id="chkHijos" value="ON"/>&nbsp;
                                    Cantidad <input name="txtHijos" id="txtHijos" min="0" type="number" style="width: 50px"   value="2" disabled/>
                                </td>
                                <td>&nbsp;&nbsp;Padece alguna enfermedad crónica</td>
                                <td>
                                    <input type="checkbox" name="chkEnfermedad" value="ON" />&nbsp; Si





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
                <input type="submit" class="btn btn-primary" value="Postular">

            </form>
        </div>
    </body>
</html>
