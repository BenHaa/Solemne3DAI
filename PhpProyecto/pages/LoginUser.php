<?php
session_start();
if (session_status() == PHP_SESSION_DISABLED || session_status() == PHP_SESSION_NONE) {

//Si la sesion es distinta de vacio
} elseif (!empty($_SESSION["perfil"])) {
    $perfil = $_SESSION["perfil"];
    if ($perfil == '1') {
        header('Location: ../pages/postulanteHome.php');
    }
    if ($perfil == '2') {
        header('Location: ../pages/ejecutivoHome.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
        <!--===============================================================================================-->

        <script src="../assets/js/jquery331.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../css/js/jquery.rut.js"></script>




    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="../assets/images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" action="../server/Login.php" method="POST">
                        <span class="login100-form-title">
                            BIENVENIDO
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Rut requerido">
                            <input class="input100" type="text" name="txtRut" placeholder="&nbsp;Rut"id="txtRut" >
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-id-card" aria-hidden="true"></i>
                            </span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
                            <input class="input100" type="password" name="txtPassword" placeholder="Contraseña" value="hola" maxlength="12">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                INICIAR SESION
                            </button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Olvidó su
                            </span>
                            <a class="txt2" href="#">
                                Contraseña?
                            </a>
                        </div>
                        <div class="text-center p-t-136">
                            <a class="txt2"  data-toggle="modal" data-target="#exampleModal">
                                registrar Cuenta
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $('#txtRut').rut({formatOn: 'keyup'});
        </script>



        <!--===============================================================================================-->	
        <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="../assets/vendor/bootstrap/js/popper.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="../assets/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="../assets/vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            });
        </script>
        <!--===============================================================================================-->
        <script src="../assets/js/main.js"></script>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" >Crear Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../server/RegistrarUsuario.php" method="POST">

                        <div class="modal-body">


                            <?php
                            if (isset($_SESSION["exito"])) {
                                if ($_SESSION["exito"] == true) {
                                    ?>
                                    <script> alert('Se registró el usuario correctamente');</script>    
                                <?php } else { ?>
                                    <script> alert('No se registró el usuario');</script>    
                                    <?php
                                }
                                unset($_SESSION["exito"]); //Se borra esta variable para que no despliegue la alerta cada vez que se quiera volver a esta página
                            }
                            ?>

                            <table border="1" class="table-striped" style="width: 100%;" >
                                <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: center;">Formulario de Registro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;Rut</td>
                                        <td><input type="text" name="txtRut" id="txtRut" value="19.360.198-7" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Nombre</td>
                                        <td><input type="text" name="txtNombre" value="juan" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Apellido Paterno</td>
                                        <td><input type="text" name="txtApPaterno" value="lopez" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Apellido Materno</td>
                                        <td><input type="text" name="txtApMaterno" value="garrido" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Contraseña</td>
                                        <td><input type="text" name="txtContrasena" value="hola" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;Repetir Contraseña</td>
                                        <td><input type="text" name="txtContrasena2" value="hola"  class="form-control"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>

                            >


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </body>
</html>
