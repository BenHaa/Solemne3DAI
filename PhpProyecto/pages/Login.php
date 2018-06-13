<html>
    <head>
        <meta charset="UTF-8">
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>

        <link rel="stylesheet" href="../css/style/bootstrap.css">
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="align-content-center">
                    <h3>INICIAR SESION</h3>
                </div>
            </div>
            <div class="row centered">
                <div class="col"></div>
                <div class="col">
                    <form class="form-group"action="../server/Login.php" method="POST">
                        RUT<br>
                        <input type="text" name="txtRut" value="19.360.198-7"><br>
                        CONTRASEÑA<br>
                        <input type="password" name="txtPassword" value="hola"><br><br>
                        <input type="submit" class="btn btn-primary" value="INICIAR SESION">                    
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
