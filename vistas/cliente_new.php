<div class="container is-fluid mb-1">
    <h1 class="title">Clientes</h1>
    <h2 class="subtitle">Nuevo cliente</h2>
    <div class=" column">
        <a href="index.php?vista=cliente_new">
            <span class=" icon">
                <i class="fa fa-solid fa-circle-plus" style="color: orange;"></i>
            </span>
            Agregar nuevo cliente</a>
    </div>
    <div class=" column">
        <a href="index.php?vista=cliente_list">
            <span class=" icon">
                <i class="fa fa-solid fa-forward" style="color: orange;"></i>
            </span>
            Ver cliente registrado</a>
    </div>
</div>

<div class=" container pb-6 pt-1">
    <div class="form-rest mb-6 mt-1"></div>
    <form action="./php/cliente_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">
        <div class="columns">
            <!-- Identificacion -->
            <div class="column">
                <div class="control">
                    <label>Identificación</label>
                    <input class="input" type="text" name="tcliente_identificacion" pattern="[0-9]{3,13}[- ]?[0-9]{3,7}[- ]?[0-9]{3,7}[- ]?[0-9]{1}" maxlength="13" required>
                </div>
            </div>
            <!-- Nombre del cliente  -->
            <div class="column">
                <div class="control">
                    <label>Nombres completos</label>
                    <input class="input" type="text" name="tcliente_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,250}" maxlength="200" required>
                </div>
            </div>
        </div>
        <div class="columns">
            <!-- Dirección -->
            <div class="column">
                <div class="control">
                    <label>Dirección</label>
                    <input class="input" type="text" name="tcliente_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,250}" maxlength="200" required>
                </div>
            </div>
            <!-- Ciudad -->
            <div class="column">
                <div class="control">
                    <label>Ciudad</label>
                    <input class="input" type="text" name="tcliente_ciudad" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\- ]{1,250}" maxlength="200" required>
                </div>
            </div>
        </div>
        <div class="columns">
            <!-- Telefono -->
            <div class="column">
                <div class="control">
                    <label>Teléfono</label>
                    <input class="input" type="text" name="tcliente_telefono" pattern="[0-9]{7,12}" maxlength="15" required>
                </div>
            </div>
            <!-- Correo electronico -->
            <div class="column">
                <div class="control">
                    <label>Correo electrónico</label>
                    <input class="input" type="email" name="tcliente_email" maxlength="100">
                </div>
            </div>
        </div>
        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>