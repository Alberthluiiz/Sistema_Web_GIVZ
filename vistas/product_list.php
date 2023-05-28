<div class="container is-fluid mb-6">
    <h1 class="title">Productos</h1>
    <h2 class="subtitle">Lista de productos</h2>
    <div class="column mb-0 mt-0">
        <a href="index.php?vista=product_list">
            <span class="icon">
                <i class="fa fa-sharp fa-solid fa-rotate-right" style="color: orange;"></i>
            </span>
            Actualizar
        </a>
    </div>
    <div class="column mb-0 mt-0">
        <a href="index.php?vista=product_new">
            <span class="icon">
                <i class="fa fa-solid fa-backward" style="color: orange;"></i>
            </span>
            Regresar
        </a>
    </div>
    <div class="column mb-0 mt-0">
        <a href="index.php?vista=product_category">
            <span class="icon">
                <i class="fa fa-solid fa-forward" style="color: orange;"></i>
            </span>
            Ver por categoria
        </a>
    </div>
</div>

<div class="container pb-6 pt-1">
    <?php
    require_once "./php/main.php";

    # Eliminar producto #
    if (isset($_GET['product_id_del'])) {
        require_once "./php/producto_eliminar.php";
    }

    if (!isset($_GET['page'])) {
        $pagina = 1;
    } else {
        $pagina = (int) $_GET['page'];
        if ($pagina <= 1) {
            $pagina = 1;
        }
    }

    $categoria_id = (isset($_GET['category_id'])) ? $_GET['category_id'] : 0;

    $pagina = limpiar_cadena($pagina);
    $url = "index.php?vista=product_list&page="; /* <== */
    $registros = 10;
    $busqueda = "";

    # Paginador producto #
    require_once "./php/producto_lista.php";
    ?>
</div>