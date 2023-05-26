<div class="container is-fluid mb-6">
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Lista de usuarios</h2>
    <div class=" column">
        <a href="index.php?vista=user_list">
            <span class="icon">
                <i class="fa fa-sharp fa-solid fa-rotate-right" style="color: orange;"></i>
            </span>
            Actualizar
        </a>
    </div>
</div>

<div class="container pb-6 pt-1">
    <?php
    require_once "./php/main.php";

    # Eliminar usuario #
    if (isset($_GET['user_id_del'])) {
        require_once "./php/usuario_eliminar.php";
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
    $url = "index.php?vista=user_list&page=";
    $registros = 12;
    $busqueda = "";

    # Paginador usuario #
    require_once "./php/usuario_lista.php";
    ?>
</div>