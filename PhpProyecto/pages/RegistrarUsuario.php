<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>

        <link rel="stylesheet" href="../css/style/bootstrap.css">

        <title></title>
    </head>
    <body>
        <form action="../server/RegistrarUsuario.php" method="POST">
            <table border="1" class="offset-md-1" >
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
                        <td><input type="text" name="txtContraseña" value="hola" /></td>
                    </tr>
                    <tr>
                        <td>Repetir Contraseña</td>
                        <td><input type="text" name="txtContraseña2" value="hola" /></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <button type="button" class="btn btn-primary offset-md-2">Grabar</button>
        </form>

        <script>
            $('#txtRut').rut({formatOn: 'keyup'});


        </script>



    </body>
</html>
