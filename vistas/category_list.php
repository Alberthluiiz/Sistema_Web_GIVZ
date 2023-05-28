<div class="container is-fluid mb-6">
    <h1 class="title">Categorías</h1>
    <h2 class="subtitle">Lista de categoría</h2>
    <div class=" column">
        <a href="index.php?vista=category_list">
            <span class="icon">
                <i class="fa fa-sharp fa-solid fa-rotate-right" style="color: orange;"></i>
            </span>
            Actualizar
        </a>
    </div>
    <div class=" column">
        <a href="index.php?vista=category_new">
            <span class="icon">
                <i class="fa fa-solid fa-backward" style="color: orange;"></i>
            </span>
            Regresar
        </a>
    </div>
</div>

<div class="container pb-6 pt-1">
    <?php
    require_once "./php/main.php";

    # Eliminar categoria #
    if (isset($_GET['category_id_del'])) {
        require_once "./php/categoria_eliminar.php";
    }

    if (!isset($_GET['page'])) {
        $pagina = 1;
    } else {
        $pagina = (int) $_GET['page'];
        if ($pagina <= 1) {
            $pagina = 1;
        }
    }

    $pagina = limpiar_cadena($pagina);
    $url = "index.php?vista=category_list&page="; /* <== */
    $registros = 12;
    $busqueda = "";

    # Paginador categoria #
    require_once "./php/categoria_lista.php";
    ?>
</div>