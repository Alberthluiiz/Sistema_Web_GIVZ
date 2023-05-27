<?php

/*== Almacenando datos ==*/
$customer_id_del = limpiar_cadena($_GET['customer_id_del']);

/*== Verificando usuario ==*/
$check_cliente = conexion();
$check_cliente = $check_cliente
    ->query("SELECT tcliente_id 
				FROM givz_tcliente 
				WHERE tcliente_id='$customer_id_del'");

if ($check_cliente->rowCount() == 1) {
    //relacion con tabla ventas* ***********
    $check_ventas = conexion();
    $check_ventas = $check_ventas
        ->query("SELECT tcliente_id 
					FROM givz_tventa 
					WHERE tcliente_id='$customer_id_del' LIMIT 1");

    if ($check_ventas->rowCount() <= 0) {

        $eliminar_cliente = conexion();
        $eliminar_cliente = $eliminar_cliente
            ->prepare("DELETE FROM givz_tcliente 
						WHERE tcliente_id=:id");

        $eliminar_cliente->execute([":id" => $customer_id_del]);

        if ($eliminar_cliente->rowCount() == 1) {
            echo '
		            <div class="notification is-info is-light">
		                <strong>¡CLIENTE ELIMINADO!</strong><br>
		                Los datos del CLIENTE se eliminaron con exito
		            </div>
		        ';
        } else {
            echo '
		            <div class="notification is-danger is-light">
		                <strong>¡Ocurrio un error inesperado!</strong><br>
		                No se pudo eliminar el CLIENTE, por favor intente nuevamente
		            </div>
		        ';
        }
        $eliminar_cliente = null;
    } else {
        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                No podemos eliminar el cliente ya que tiene ventas asociadas
	            </div>
	        ';
    }
    $check_ventas = null; //revisión con la tabla de ventas
} else {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El CLIENTE que intenta eliminar no existe
            </div>
        ';
}
$check_cliente = null;
