
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Estado de Solicitud</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">

                            <a class="navbar-brand" href="#">Estado de su Solicitud</a>
                        </div>

                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">&nbsp;&nbsp;</div>
                            <div class="col-lg-4">
                                <form action="../server/BuscarPorRut.php" id="formConsultar">
                                    <table class="table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" id="txtRut" name="txtRut" placeholder="Rut" required>
                                                </td>
                                                <td>
                                                    &nbsp;&nbsp;<input type="submit" class="btn btn-primary" value="Mi solicitud">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a id="info"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <script>
                                        $('#txtRut').rut({formatOn: 'keyup'});
                                    </script>
                                </form>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>

                        <div class="row" id="consulta">

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
    <script>
        $(document).ready(function ()
        {
            $("#formConsultar").submit(function ()
            {
                $.post("../server/BuscarPorRut.php",{rut:$("#txtRut").val()} );
            });
        });
    </script>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

</html>


