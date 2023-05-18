<div class="container is-fluid mb-1">
    <h1 class="title">Ventas</h1>
    <h2 class="subtitle">Nueva Venta</h2>
    <div class=" column">
        <a href="index.php?vista=product_new">Agregar nueva venta</a>
    </div>
</div>

<div class="container pb-6">
    <?php
    require_once "./php/main.php";
    ?>

    <form action="/php/venta_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">

        <div class="columns">
            <!-- Nombre de los Clientes -->
            <div class="column">
                <label class=" has-text-white is-size-5">Nombre del Cliente</label><br>
                <div class="select is-rounded is-fullwidth">
                    <select name="givz_tcliente">
                        <option value="" selected="">Seleccione un cliente</option>
                        <?php
                        $ventas = conexion();
                        /* Nombre de la tabla que deseamos ver o seleccionar */
                        $ventas = $ventas->query("SELECT * FROM givz_tcliente ");
                        if ($ventas->rowCount() > 0) {
                            $ventas = $ventas->fetchAll();
                            foreach ($ventas as $row) {
                                echo '<option value="' . $row['tcliente_id'] . '">' . $row['tcliente_nombre'] . '</option>';
                            }
                        }
                        $ventas = null;
                        ?>
                    </select>
                </div>
                <!-- Codigo de barras -->
                <div class=" column">
                    <form action="venta_guardar.php" method="post" class="row">

                        <div class=" columns">
                            <div class="column is-10">
                                <input class="input is-large" name="codigo" autofocus id="codigo" type="text" placeholder="Código de barras del producto" aria-label="codigoBarras">
                            </div>
                            <div class="column">
                                <input type="submit" value="Agregar" name="agregar" class="button is-success mt-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <?php
    require "./php/venta_guardar.php"
    ?>
</div>