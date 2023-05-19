<?php

require_once "main.php";

/* Almacenamos los datos del formulario */
$identificacion = limpiar_cadena($_POST['tcliente_identificacion']);
$nombre = limpiar_cadena($_POST['tcliente_nombre']);

$direccion = limpiar_cadena($_POST['tcliente_direccion']);
$ciudad = limpiar_cadena($_POST['tcliente_ciudad']);

$telefono = limpiar_cadena($_POST['tcliente_telefono']);
$email = limpiar_cadena($_POST['tcliente_email']);


/* Verificamos todos los campos obligatorios */
if ($identificacion == "" || $nombre == "" || $direccion == "" || $ciudad == "" || $telefono == "") {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}

/* Realizamos la verificación de la integridad de los datos */
/* Identificacion */
if (verificar_datos("[0-9]{3,13}[- ]?[0-9]{3,7}[- ]?[0-9]{3,7}[- ]?[0-9]{1}", $identificacion)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El número de cedula no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/* Nombre */
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,}", $nombre)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El nombre no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/* Dirección */
if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,}", $direccion)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La dirección no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/* Ciudad */
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,}", $ciudad)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La ciudad no coincide con el formato solicitado
            </div>
        ';
    exit();
}

/* Telefono */
if (verificar_datos("[0-9]{7,12}", $telefono)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El número ingresado no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/* Email */
if ($email != "") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check_email = conexion();
        $check_email = $check_email
            ->query("SELECT tcliente_email
                        FROM givz_tcliente
                        WHERE tcliente_email='$email'");
        if ($check_email->rowCount() > 0) {
            echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        El correo electrónico ingresado ya se encuentra registrado, por favor elija otro
                    </div>
                ';
            exit();
        }
        $check_email = null;
    } else {
        echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Ha ingresado un correo electrónico no valido
                </div>
            ';
        exit();
    }
}
/* Guardamos los datos en la Base de Datos */
$guardar_cliente = conexion();
$guardar_cliente = $guardar_cliente
    ->prepare("INSERT INTO givz_tcliente(tcliente_identificacion, tcliente_nombre, tcliente_direccion, tcliente_ciudad, tcliente_telefono, tcliente_email) 
        VALUES(:identificacion,:nombre,:direccion,:ciudad,:telefono,:email)");

$marcadores = [
    ":identificacion" => $identificacion,
    ":nombre" => $nombre,
    ":direccion" => $direccion,
    ":ciudad" => $ciudad,
    ":telefono" => $telefono,
    ":email" => $email
];

$guardar_cliente->execute($marcadores);

if ($guardar_cliente->rowCount() == 1) {
    echo '
            <div class="notification is-info is-light">
                <strong>¡CLIENTE REGISTRADO!</strong><br>
                El cliente se registro con exito
            </div>
        ';
} else {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el usuario, por favor intente nuevamente
            </div>
        ';
}
$guardar_cliente = null;
