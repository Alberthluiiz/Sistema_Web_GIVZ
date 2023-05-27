<?php
require_once "main.php";

/*== Almacenando id ==*/
$id = limpiar_cadena($_POST['tcliente_id']);


/*== Verificando cliente ==*/
$check_cliente = conexion();
$check_cliente = $check_cliente->query("SELECT * FROM givz_tcliente WHERE tcliente_id='$id'");

if ($check_cliente->rowCount() <= 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El cliente no existe en el sistema
            </div>
        ';
    exit();
} else {
    $datos = $check_cliente->fetch();
}
$check_cliente = null;

/*== Almacenando datos ==*/
$identificacion = limpiar_cadena($_POST['tcliente_identificacion']);
$nombre = limpiar_cadena($_POST['tcliente_nombre']);
$direccion = limpiar_cadena($_POST['tcliente_direccion']);
$ciudad = limpiar_cadena($_POST['tcliente_ciudad']);
$telefono = limpiar_cadena($_POST['tcliente_telefono']);
$email = limpiar_cadena($_POST['tcliente_email']);


/*== Verificando campos obligatorios del cliente ==*/
if ($identificacion == "" || $nombre == "" || $direccion == "" || $ciudad == "" || $telefono == "" || $email == "") {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}


/*== Verificando campos obligatorios ==
if ($identificacion == "") {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}*/


/*== Verificando integridad de los datos ==*/
if (verificar_datos("[0-9 ]{10,13}", $identificación)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La IDENTIFICACIÓN no coincide con el formato solicitado<br>
                CEDULA 10 dígitos, RUC 13 dígitos
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}", $nombre)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
    exit();
}

/*if ($ubicacion != "") {
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}", $ubicacion)) {
        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La UBICACION no coincide con el formato solicitado
	            </div>
	        ';
        exit();
    }
}*/

if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,100}", $direccion)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}", $ciudad)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
    exit();
}

if (verificar_datos("[0-9 ]{8,10}", $telefono)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El télefono no coincide con el formato solicitado
            </div>
        ';
    exit();
}

/*== Verificando email ==*/
if ($email != "" && $email != $datos['tcliente_email']) {
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

/*== Actualizar datos ==*/
$actualizar_cliente = conexion();
$actualizar_cliente = $actualizar_cliente
    ->prepare("UPDATE givz_tcliente 
                SET tcliente_identificacion=:identificacion,tcliente_nombre=:nombre,tcliente_direccion=:direccion,tcliente_ciudad=:ciudad,tcliente_telefono=:telefono,tusuario_email=:email 
                WHERE tcliente_id=:id");

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
                <strong>¡CLIENTE ACTUALIZADO!</strong><br>
                El Cliente se actualizó con exito
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
