<?php
require_once "../inc/session_start.php";

require_once "main.php";
//echo '<pre>'; var_dump($_POST); die('</pre>');
if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    /*== Verificando producto ==*/
    $venta_producto = conexion();
    $venta_producto = $venta_producto->query("SELECT * FROM givz_tproducto WHERE tproducto_codigo='$codigo'");
    $mensaje = '';
    $datos = array();
    if ($venta_producto->rowCount() <= 0) {
        $mensaje = '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    El producto no existe en el sistema
                </div>
            ';
    } else {
        $datos = $venta_producto->fetch();
    }
    $venta_producto = null;
    echo json_encode(array('datos' => $datos, 'mensaje' => $mensaje));
    exit;
} else if (isset($_POST['idproducto'])) {
    $productoventa = array();
    $total = 0;
    foreach ($_POST['idproducto'] as $i => $idproducto) {
        $productoventa[] = array(
            ':tprodvta_cantidad' => $_POST['cantidad'][$i],
            ':tprodvta_precio' => $_POST['precio'][$i],
            ':tproducto_id' => $idproducto,
        );
        $total += $_POST['cantidad'][$i] * $_POST['precio'][$i];
    }

    $pdo = conexion();
    $guardar_venta = $pdo
        ->prepare("INSERT INTO givz_tventa(tventa_fecha,tventa_total,tcliente_id,tusuario_id) 
                    VALUES(:fecha,:total,:cliente,:usuario)");

    $marcadores = [
        ":fecha" => date('Y-m-d H:i:s'),
        ":total" => $total,
        ":cliente" => $_POST['givz_tcliente'],
        ":usuario" => $_SESSION['id']
    ];

    $guardar_venta->execute($marcadores);

    $idventa = $pdo->lastInsertId();
    //echo '<pre>'; var_dump($idventa); die('</pre>');
    foreach ($productoventa as $item) {
        $item[':tventa_id'] = $idventa;
        $guardar_venta_producto = $pdo
            ->prepare("INSERT INTO givz_trprodvta(tprodvta_cantidad,tprodvta_precio,tproducto_id,tventa_id) 
                    VALUES(:tprodvta_cantidad,:tprodvta_precio,:tproducto_id,:tventa_id)");
        $guardar_venta_producto->execute($item);
    }
    echo json_encode(array('resultado' => 'ok', 'mensaje' => '<div class="notification is-success is-light">
    <strong>Venta guardada con éxito</strong>
</div>'));
    exit;
}
