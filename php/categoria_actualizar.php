<?php
require_once "main.php";

/*== Almacenando id ==*/
$id = limpiar_cadena($_POST['tcategoria_id']);


/*== Verificando categoria ==*/
$check_categoria = conexion();
$check_categoria = $check_categoria->query("SELECT * FROM givz_tcategoria WHERE tcategoria_id='$id'");

if ($check_categoria->rowCount() <= 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La categoría no existe en el sistema
            </div>
        ';
    exit();
} else {
    $datos = $check_categoria->fetch();
}
$check_categoria = null;

/*== Almacenando datos ==*/
$nombre = limpiar_cadena($_POST['tcategoria_nombre']);
$ubicacion = limpiar_cadena($_POST['tcategoria_ubicacion']);


/*== Verificando campos obligatorios ==*/
if ($nombre == "") {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}


/*== Verificando integridad de los datos ==*/
if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}", $nombre)) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
    exit();
}

if ($ubicacion != "") {
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}", $ubicacion)) {
        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La UBICACION no coincide con el formato solicitado
	            </div>
	        ';
        exit();
    }
}


/*== Verificando nombre ==*/
if ($nombre != $datos['tcategoria_nombre']) {
    $check_nombre = conexion();
    $check_nombre = $check_nombre
        ->query("SELECT tcategoria_nombre 
                    FROM givz_tcategoria 
                    WHERE tcategoria_nombre='$nombre'");
    if ($check_nombre->rowCount() > 0) {
        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                El NOMBRE ingresado ya se encuentra registrado, por favor elija otro
	            </div>
	        ';
        exit();
    }
    $check_nombre = null;
}


/*== Actualizar datos ==*/
$actualizar_categoria = conexion();
$actualizar_categoria = $actualizar_categoria
    ->prepare("UPDATE givz_tcategoria 
                SET tcategoria_nombre=:nombre,tcategoria_ubicacion=:ubicacion 
                WHERE tcategoria_id=:id");

$marcadores = [
    ":nombre" => $nombre,
    ":ubicacion" => $ubicacion,
    ":id" => $id
];

if ($actualizar_categoria->execute($marcadores)) {
    echo '
            <div class="notification is-info is-light">
                <strong>¡CATEGORIA ACTUALIZADA!</strong><br>
                La categoría se actualizo con exito
            </div>
        ';
} else {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar la categoría, por favor intente nuevamente
            </div>
        ';
}
$actualizar_categoria = null;
