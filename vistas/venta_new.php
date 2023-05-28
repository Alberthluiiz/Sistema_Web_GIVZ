<div class="container is-fluid mb-1">
    <h1 class="title">Ventas</h1>
    <h2 class="subtitle">Nueva Venta</h2>
    <div class=" column">
        <a href="index.php?vista=venta_new">
            <span class=" icon">
                <i class="fa fa-solid fa-circle-plus" style="color: orange;"></i>
            </span>
            Agregar nueva venta</a>
    </div>
    <div class=" column">
        <a href="index.php?vista=venta_list">
            <span class=" icon">
                <i class="fa fa-solid fa-forward" style="color: orange;"></i>
            </span>
            Ver venta registrada</a>
    </div>
</div>

<div class="container pb-6">
    <?php
    require_once "./php/main.php";
    ?>
    <form action="" id="formventas" method="POST" class="FormularioAjax" autocomplete="off">
        <div id="mensaje"></div>
        <div class="form-rest mb-6 mt-1"></div>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label class="label">Clientes</label>
                    <div class="select is-rounded is-fullwidth">
                        <select name="givz_tcliente" id="givz_tcliente">
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
                </div>
            </div>
        </div>
        <!-- Productos -->
        <div class="columns">
            <div class="column">
                <label class="label">Productos</label>
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="codigoproducto" placeholder="Escriba el código">
                    </div>
                    <div class="control">
                        <button type="button" class="button is-primary" id="btnbuscarproducto">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cantidad -->
        <div class="columns">
            <div class="column">
                <label class="label">Nombre Producto</label>
                <div class="control">
                    <input class="input" type="text" id="nombreproducto" readonly>
                </div>
            </div>
            <!-- Cantidad -->
            <div class="column">
                <label class="label">Cantidad</label>
                <div class="control">
                    <input class="input" type="number" id="cantidadproducto" placeholder="Cantidad">
                </div>
            </div>
            <!-- Precio de compra -->

            <!-- Precio de venta -->
            <div class="column">
                <label class="label">Precio venta</label>
                <div class="control">
                    <input class="input" type="text" id="precioproducto" placeholder="Precio">
                </div>
            </div>
            <!-- Boton agregar -->
            <div class="column">
                <div class="control mr-3 mt-5">
                    <input type="hidden" id="idproducto">
                    <button type="button" id="btnagregar" class="button is-primary">Agregar</button>
                </div>
            </div>
        </div>
        <!-- Tabla para ingresar -->
        <div class="columns">
            <div class="column">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Productos</th>
                            <th>Cantidad</th>
                            <th>Precio venta</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="tablaventa">

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Botones para registrar compra y cancelar -->
        <div class="columns">
            <div class="column">
                <div class="field is-grouped">
                    <div class="control">
                        <button type="button" id="registrarcompra" class="button is-primary">Registrar Compra</button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button is-light">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>