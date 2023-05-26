<div class="container is-fluid mb-6">
    <h1 class="title">Clientes</h1>
    <h2 class="subtitle">Actualizar cliente</h2>
</div>

<div class="container pb-6 pt-6">
    <?php

    require_once "./php/main.php";

    $id = (isset($_GET['cliente_id_up'])) ? $_GET['cliente_id_up'] : 0;
    $id = limpiar_cadena($id);

    /*== Verificando cliente ==*/
    $check_cliente = conexion();
    $check_cliente = $check_cliente
        ->query("SELECT * FROM givz_tcliente
                WHERE tcliente_id='$id'");

    if ($check_cliente->rowCount() > 0) {
        $datos = $check_cliente->fetch();
    ?>
        <!-- Boton para regregar -->

        <div class="column">
            <div class="is-pulled-right">
                <a href="index.php?vista=cliente_list">
                    <button type="submit" class="button is-info is-rounded"> <- Regresar Atras</button>
                </a>
            </div>
        </div>
        <div class="form-rest mb-6 mt-6"></div>

        <h2 class="title has-text-centered">
            <?php echo $datos['tcliente_nombre'];
            ?>
        </h2>

        <form action="./php/cliente_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off">

            <input type="hidden" name="tcliente_id" value="
			<?php
            echo $datos['tcliente_id'];
            ?>" required>

            <div class="columns">
                <!-- Identificacion -->
                <div class="column">
                    <div class="control">
                        <label>Identificación</label>
                        <input class="input" type="text" name="tcliente_identificacion" pattern="[0-9]{3,13}[- ]?[0-9]{3,7}[- ]?[0-9]{3,7}[- ]?[0-9]{1}" maxlength="13" required value="<?php echo $datos['tcliente_identificacion']; ?>">
                    </div>
                </div>
                <!-- Nombre del cliente  -->
                <div class="column">
                    <div class="control">
                        <label>Nombre</label>
                        <input class="input" type="text" name="tcliente_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,}" maxlength="200" required value="<?php echo $datos['tcliente_nombre']; ?>">
                    </div>
                </div>
            </div>
            <div class="columns">
                <!-- Dirección -->
                <div class="column">
                    <div class="control">
                        <label>Dirección</label>
                        <input class="input" type="text" name="tcliente_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,250}" maxlength="200" required value="<?php echo $datos['tcliente_direccion']; ?>">
                    </div>
                </div>
                <!-- Ciudad -->
                <div class="column">
                    <div class="control">
                        <label>Ciudad</label>
                        <input class="input" type="text" name="tcliente_ciudad" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,250}" maxlength="200" required value="<?php echo $datos['tcliente_ciudad']; ?>">
                    </div>
                </div>
            </div>
            <div class="columns">
                <!-- Telefono -->
                <div class="column">
                    <div class="control">
                        <label>Telefono</label>
                        <input class="input" type="text" name="tcliente_telefono" pattern="[0-9]{7,12}" maxlength="15" required value="<?php echo $datos['tcliente_telefono']; ?>">
                    </div>
                </div>
                <!-- Correo electronico -->
                <div class="column">
                    <div class="control">
                        <label>Correo electronico</label>
                        <input class="input" type="email" name="tcliente_email" maxlength="100" value="<?php echo $datos['tcliente_email']; ?>">
                    </div>
                </div>
            </div>
            <p class="has-text-centered">
                <button type="submit" class="button is-info is-rounded">Actualizar</button>
            </p>
        </form>
    <?php
    } else {
        include "./inc/error_alert.php";
    }
    $check_cliente = null;
    ?>
</div>