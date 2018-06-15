<?php
session_start();
IF (isset($_SESSION)) {
    if (session_status() == PHP_SESSION_DISABLED || session_status() == PHP_SESSION_NONE) {
        header('Location: ../pages/Loginv2.php');
    }
    ELSE {
        $perfil = $_SESSION["perfil"];
        echo $perfil;
        if ($perfil == '1') {
            header('Location: ../pages/perfil1.php');
        }
        if ($perfil == '2') {
            header('Location: ../pages/perfil1.php');
        }
    }
} else {

    echo "no hay sesion";
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
// put your code here
?>
        <!--<button><a href="pagina2.php">MOVER</a></button> -->

    </body>
</html>
