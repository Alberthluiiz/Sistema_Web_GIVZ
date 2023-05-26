<?php
require_once "./php/main.php";

if (isset($_GET['cliente_id_del'])) {
    $cliente_id_del = $_GET['cliente_id_del'];

    // Verificar si el cliente existe
    $conexion = conexion();
    $check_cliente = $conexion->prepare("SELECT tcliente_id FROM givz_tcliente WHERE tcliente_id = :cliente_id");
    $check_cliente->bindParam(':cliente_id', $cliente_id_del);
    $check_cliente->execute();

    if ($check_cliente->rowCount() == 1) {
        // Eliminar el cliente
        $eliminar_cliente = $conexion->prepare("DELETE FROM givz_tcliente WHERE tcliente_id = :cliente_id");
        $eliminar_cliente->bindParam(':cliente_id', $cliente_id_del);
        $eliminar_cliente->execute();

        if ($eliminar_cliente->rowCount() == 1) {
            echo '
                <div class="notification is-info is-light">
                    <strong>¡CLIENTE ELIMINADO!</strong><br>
                    Los datos del cliente se eliminaron con éxito
                </div>
            ';
        } else {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    No se pudo eliminar el cliente, por favor intente nuevamente
                </div>
            ';
        }
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                El cliente que intenta eliminar no existe
            </div>
        ';
    }

    $conexion = null;
}
