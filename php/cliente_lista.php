<?php
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$tabla = "";

if (isset($busqueda) && $busqueda != "") {

    $consulta_datos = "SELECT * FROM givz_tcliente
						WHERE ((tcliente_id!='" . $_SESSION['id'] . "') AND (tcliente_identificacion LIKE '%$busqueda%' OR tcliente_nombre LIKE '%$busqueda%' OR tcliente_direccion LIKE '%$busqueda%' OR tcliente_ciudad LIKE '%$busqueda%' OR tcliente_telefono LIKE '%$busqueda%' OR tcliente_email LIKE '%$busqueda%')) ORDER BY tcliente_nombre ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(tcliente_id)
							FROM givz_tcliente 
							WHERE ((tcliente_id!='" . $_SESSION['id'] . "') AND (tcliente_identificacion LIKE '%$busqueda%' OR tcliente_nombre LIKE '%$busqueda%' OR tcliente_direccion LIKE '%$busqueda%' OR tcliente_ciudad LIKE '%$busqueda%' OR tcliente_telefono LIKE '%$busqueda%' OR tcliente_email LIKE '%$busqueda%'))";
} else {

    $consulta_datos = "SELECT * FROM givz_tcliente 
						WHERE       tcliente_id!='" . $_SESSION['id'] . "' ORDER BY tcliente_nombre ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(tcliente_id) 
							FROM givz_tcliente 
							WHERE tcliente_id!='" . $_SESSION['id'] . "'";
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
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Correo electronico</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
	';

if ($total >= 1 && $pagina <= $Npaginas) {
    $contador = $inicio + 1;
    $pag_inicio = $inicio + 1;
    foreach ($datos as $rows) {
        $tabla .= '
				<tr class="has-text-centered" >
					<td>' . $contador . '</td>
                    <td>' . $rows['tcliente_identificacion'] . '</td>
                    <td>' . $rows['tcliente_nombre'] . '</td>
                    <td>' . $rows['tcliente_direccion'] . '</td>
                    <td>' . $rows['tcliente_ciudad'] . '</td>
                    <td>' . $rows['tcliente_telefono'] . '</td>
                    <td>' . $rows['tcliente_email'] . '</td>
                    <td>
                        <a href="index.php?vista=cliente_update&cliente_id_up=' . $rows['tcliente_id'] . '">
                        <span class="icon">
                			<i class="fa fa-solid fa-pen-to-square" style="color: green;"></i>
            			</span></a>
                    </td>
                    <td>
                        <a href="' . $url . $pagina . '&cliente_id_del=' . $rows['tcliente_id'] . '">
                        <span class ="icon">
						<i class="fa fa-sharp fa-solid fa-trash" style="color: red;"></i>
						</span></a>
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
    $tabla .= '<p class="has-text-right">Mostrando usuarios <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

$conexion = null;
echo $tabla;

if ($total >= 1 && $pagina <= $Npaginas) {
    echo paginador_tablas($pagina, $Npaginas, $url, 7, $busqueda);
}
