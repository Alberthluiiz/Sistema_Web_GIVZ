<?php
require_once "../inc/session_start.php";

require_once "main.php";

/*== Almacenando id ==*/
$id = limpiar_cadena($_POST['tcliente_id']);


/*== Almacenando datos del cliente ==*/
$identificacion = limpiar_cadena($_POST['tcliente_identificacion']);
$nombre = limpiar_cadena($_POST['tcliente_nombre']);

$direccion = limpiar_cadena($_POST['tcliente_direccion']);
$ciudad = limpiar_cadena($_POST['tcliente_ciudad']);

$telefono = limpiar_cadena($_POST['tcliente_telefono']);
$email = limpiar_cadena($_POST['tcliente_email']);


/*== Verificando campos obligatorios del cliente ==*/
if ($identificacion == "" || $nombre == "" || $direccion == "" || $ciudad == "" || $telefono == "") {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}


/*== Verificando integridad de los datos (Cedula o Ruc) ==*/
if (verificar_datos("[0-9]{3,13}[- ]?[0-9]{3,7}[- ]?[0-9]{3,7}[- ]?[0-9]{1}", $identificacion)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La Cedula o Ruc no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/*== Verificando integridad de los datos (Nombre) ==*/
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,}", $nombre)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/*== Verificando integridad de los datos (Dirección) ==*/
if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,250}", $direccion)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La dirección no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/*== Verificando integridad de los datos (Ciudad) ==*/
if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,250}", $ciudad)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La ciudad no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/*== Verificando integridad de los datos (Telefono) ==*/
if (verificar_datos("[0-9]{7,12}", $telefono)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El número ingresado no coincide con el formato solicitado
            </div>
        ';
    exit();
}
/*== Verificando integridad de los datos (Correo electronico) ==*/
/* if ($email != "" && $email != $datos['tcliente_email']) {
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
} */
/*== Actualizar datos ==*/
$actualizar_cliente = conexion();
$actualizar_cliente = $actualizar_cliente
    ->prepare("UPDATE givz_tcliente
    SET tcliente_identificacion=:identificacion,tcliente_nombre=:nombre,tcliente_direccion=:direccion,tcliente_ciudad=:ciudad,tcliente_telefono=:telefono,tcliente_email=:email WHERE tcliente_id=:id");

$marcadores = [
    ":identificacion" => $identificacion,
    ":nombre" => $nombre,
    ":direccion" => $direccion,
    ":ciudad" => $ciudad,
    ":telefono" => $telefono,
    ":email" => $email,
    ":id" => $id
];

if ($actualizar_cliente->execute($marcadores)) {
    echo '
            <div class="notification is-info is-light">
                <strong>¡cliente ACTUALIZADO!</strong><br>
                El cliente se actualizo con exito
            </div>
        ';
} else {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el cliente, por favor intente nuevamente
            </div>
        ';
}
$actualizar_cliente = null;
