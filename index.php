<?php require "./inc/session_start.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <?php include "./inc/head.php"; ?>
</head>

<body>
    <?php
    ob_start(); // Habilitar almacenamiento en búfer de salida

    if (!isset($_GET['vista']) || $_GET['vista'] == "") {
        $_GET['vista'] = "login";
    }


    if (is_file("./vistas/" . $_GET['vista'] . ".php") && $_GET['vista'] != "login" && $_GET['vista'] != "404") {

        /*== Cerrar sesion ==*/
        if ((!isset($_SESSION['id']) || $_SESSION['id'] == "") || (!isset($_SESSION['usuario']) || $_SESSION['usuario'] == "")) {
            include "./vistas/logout.php";
            exit();
        }

        include "./inc/navbar.php";

        include "./vistas/" . $_GET['vista'] . ".php";

        include "./inc/script.php";
    } else {
        if ($_GET['vista'] == "login") {
            include "./vistas/login.php";
        } else {
            include "./vistas/404.php";
        }
    }
    ?>
    <footer style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #f5f5f5; padding: 10px; text-align: center;">
        <p>
            <i class="fa-solid fa-copyright"></i> Todos los derechos reservados - Grupo 3 - <?php echo date("Y"); ?>
        </p>
    </footer>
</body>

</html>