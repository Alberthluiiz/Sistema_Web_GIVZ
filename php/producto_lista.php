<?php
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$tabla = "";

$campos = " givz_tproducto.tproducto_id,
			givz_tproducto.tproducto_codigo,
			givz_tproducto.tproducto_nombre,
			givz_tproducto.tproducto_precio,
			givz_tproducto.tproducto_stock,
			givz_tproducto.tproducto_foto,
			givz_tproducto.tcategoria_id,
			givz_tproducto.tusuario_id,
			givz_tcategoria.tcategoria_id,
			givz_tcategoria.tcategoria_nombre,
			givz_tusuario.tusuario_id,
			givz_tusuario.tusuario_nombre,
			givz_tusuario.tusuario_apellido";

if (isset($busqueda) && $busqueda != "") {

	$consulta_datos = "SELECT $campos 
						FROM givz_tproducto 
						INNER JOIN givz_tcategoria 
						ON givz_tproducto.tcategoria_id=givz_tcategoria.tcategoria_id 
						INNER JOIN givz_tusuario ON givz_tproducto.tusuario_id=givz_tusuario.tusuario_id 
						WHERE givz_tproducto.tproducto_codigo LIKE '%$busqueda%' 
						OR givz_tproducto.tproducto_nombre LIKE '%$busqueda%' 
						ORDER BY givz_tproducto.tproducto_nombre ASC LIMIT $inicio,$registros";

	$consulta_total = "SELECT COUNT(tproducto_id) 
						FROM givz_tproducto 
						WHERE tproducto_codigo 
						LIKE '%$busqueda%' 
						OR tproducto_nombre LIKE '%$busqueda%'";
} elseif ($categoria_id > 0) {

	$consulta_datos = "SELECT $campos FROM givz_tproducto 
							INNER JOIN givz_tcategoria 
							ON givz_tproducto.tcategoria_id=givz_tcategoria.tcategoria_id 
							INNER JOIN givz_tusuario ON givz_tproducto.tusuario_id=givz_tusuario.tusuario_id 
							WHERE givz_tproducto.tcategoria_id='$categoria_id' 
							ORDER BY givz_tproducto.tproducto_nombre ASC LIMIT $inicio,$registros";

	$consulta_total = "SELECT COUNT(tproducto_id) FROM givz_tproducto WHERE tcategoria_id='$categoria_id'";
} else {

	$consulta_datos = "SELECT $campos 
						FROM givz_tproducto INNER JOIN givz_tcategoria 
						ON givz_tproducto.tcategoria_id=givz_tcategoria.tcategoria_id 
						INNER JOIN givz_tusuario ON givz_tproducto.tusuario_id=givz_tusuario.tusuario_id 
						ORDER BY givz_tproducto.tproducto_nombre ASC LIMIT $inicio,$registros";

	$consulta_total = "SELECT COUNT(tproducto_id) FROM givz_tproducto";
}

$conexion = conexion();

$datos = $conexion->query($consulta_datos);
$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$Npaginas = ceil($total / $registros);

if ($total >= 1 && $pagina <= $Npaginas) {
	$contador = $inicio + 1;
	$pag_inicio = $inicio + 1;
	foreach ($datos as $rows) {
		$tabla .= '
				<article class="media">
			        <figure class="media-left">
			            <p class="image is-64x64">';
		if (is_file("./img/producto/" . $rows['tproducto_foto'])) {
			$tabla .= '<img src="./img/producto/' . $rows['tproducto_foto'] . '">';
		} else {
			$tabla .= '<img src="./img/producto.png">';
		}
		$tabla .= '</p>
			        </figure>
			        <div class="media-content">
			            <div class="content">
			              <p>
			                <strong>' . $contador . ' - ' . $rows['tproducto_nombre'] . '</strong><br>
			                <strong>CODIGO:</strong> ' . $rows['tproducto_codigo'] . ', <strong>PRECIO:</strong> $' . $rows['tproducto_precio'] . ', <strong>STOCK:</strong> ' . $rows['tproducto_stock'] . ', <strong>CATEGORIA:</strong> ' . $rows['tcategoria_nombre'] . ', <strong>REGISTRADO POR:</strong> ' . $rows['tusuario_nombre'] . ' ' . $rows['tusuario_apellido'] . '
			              </p>
			            </div>
			            <div class="has-text-right">
			                <a href="index.php?vista=product_img&product_id_up=' . $rows['tproducto_id'] . '" class="button is-link is-rounded is-small">Imagen</a>
			                <a href="index.php?vista=product_update&product_id_up=' . $rows['tproducto_id'] . '">
							<span class="icon">
                			<i class="fa fa-solid fa-pen-to-square" style="color: green;"></i>
            				</span></a>
			                <a href="' . $url . $pagina . '&product_id_del=' . $rows['tproducto_id'] . '">
							<span class ="icon">
							<i class="fa fa-sharp fa-solid fa-trash" style="color: red;"></i>
							</span></a>
			            </div>
			        </div>
			    </article>
			    <hr>
            ';
		$contador++;
	}
	$pag_final = $contador - 1;
} else {
	if ($total >= 1) {
		$tabla .= '
				<p class="has-text-centered" >
					<a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>
			';
	} else {
		$tabla .= '
				<p class="has-text-centered" >No hay registros en el sistema</p>
			';
	}
}

if ($total > 0 && $pagina <= $Npaginas) {
	$tabla .= '<p class="has-text-right">Mostrando productos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

$conexion = null;
echo $tabla;

if ($total >= 1 && $pagina <= $Npaginas) {
	echo paginador_tablas($pagina, $Npaginas, $url, 7);
}
