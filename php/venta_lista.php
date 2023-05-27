<?php
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$tabla = "";

if (isset($busqueda) && $busqueda != "") {

    $consulta_datos = "SELECT tv.tventa_id, tc.tcliente_identificacion, tc.tcliente_nombre, tc.tcliente_telefono, tc.tcliente_email, tv.tventa_total
                       FROM givz_tventa tv
                       INNER JOIN givz_tcliente tc ON tv.tcliente_id = tc.tcliente_id
                       WHERE (tv.tventa_fecha LIKE '%$busqueda%' OR tc.tcliente_identificacion LIKE '%$busqueda%' OR tc.tcliente_nombre LIKE '%$busqueda%' OR tc.tcliente_telefono LIKE '%$busqueda%' OR tc.tcliente_email LIKE '%$busqueda%')
                       ORDER BY tv.tventa_fecha DESC
                       LIMIT $inicio, $registros";

    $consulta_total = "SELECT COUNT(tv.tventa_id)
                       FROM givz_tventa tv
                       INNER JOIN givz_tcliente tc ON tv.tcliente_id = tc.tcliente_id
                       WHERE (tv.tventa_fecha LIKE '%$busqueda%' OR tc.tcliente_identificacion LIKE '%$busqueda%' OR tc.tcliente_nombre LIKE '%$busqueda%' OR tc.tcliente_telefono LIKE '%$busqueda%' OR tc.tcliente_email LIKE '%$busqueda%')";
} else {

    $consulta_datos = "SELECT tv.tventa_id, tc.tcliente_identificacion, tc.tcliente_nombre, tc.tcliente_telefono, tc.tcliente_email, tv.tventa_total
                       FROM givz_tventa tv
                       INNER JOIN givz_tcliente tc ON tv.tcliente_id = tc.tcliente_id
                       ORDER BY tv.tventa_fecha DESC
                       LIMIT $inicio, $registros";

    $consulta_total = "SELECT COUNT(tv.tventa_id)
                       FROM givz_tventa tv
                       INNER JOIN givz_tcliente tc ON tv.tcliente_id = tc.tcliente_id";
}

$conexion = conexion();

$datos = $conexion->query($consulta_datos);
$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$Npaginas = ceil($total / $registros);

$tabla .= '
    <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>#</th>
                    <th>Ruc o Cedula</th>
                    <th>Nombre</th>
                    <th>Venta</th>
                    <th>Telefono</th>
                    <th>Correo electronico</th>
                    <th>Total de venta</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
';

if ($total >= 1 && $pagina <= $Npaginas) {
    $contador = $inicio + 1;
    $pag_inicio = $inicio + 1;
    foreach ($datos as $rows) {
        $tcliente_id = isset($rows['tcliente_id']) ? $rows['tcliente_id'] : '';
        $tabla .= '
                <tr class="has-text-centered" >
                    <td>' . $contador . '</td>
                    <td>' . $rows['tcliente_identificacion'] . '</td>
                    <td>' . $rows['tcliente_nombre'] . '</td>
                    <td>' . $rows['tventa_id'] . '</td>
                    <td>' . $rows['tcliente_telefono'] . '</td>
                    <td>' . $rows['tcliente_email'] . '</td>
                    <td>' . $rows['tventa_total'] . '</td>
                    <td>
                        <a href="index.php?vista=cliente_update&cliente_id_up=' . $tcliente_id . '" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>
                    <td>
                        <a href="' . $url . $pagina . '&cliente_id_del=' . $tcliente_id . '" class="button is-danger is-rounded is-small">Eliminar</a>
                    </td>
                </tr>
            ';
        $contador++;
    }
    $pag_final = $contador - 1;
} else {
    if ($total >= 1) {
        $tabla .= '
                <tr class="has-text-centered" >
                    <td colspan="7">
                        <a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
                            Haga clic acá para recargar el listado
                        </a>
                    </td>
                </tr>
            ';
    } else {
        $tabla .= '
                <tr class="has-text-centered" >
                    <td colspan="7">
                        No hay registros en el sistema
                    </td>
                </tr>
            ';
    }
}

$tabla .= '</tbody></table></div>';

if ($total > 0 && $pagina <= $Npaginas) {
    $tabla .= '<p class="has-text-right">Mostrando ventas <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

$conexion = null;
echo $tabla;

if ($total >= 1 && $pagina <= $Npaginas) {
    echo paginador_tablas($pagina, $Npaginas, $url, 7, $busqueda);
}
