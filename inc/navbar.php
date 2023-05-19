<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=home">
            <img src="/img/Logo_VinzuPal_Hor.png" width="65" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <!-- Seccion Usuarios -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">Usuarios</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=user_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=user_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=user_search" class="navbar-item">Buscar</a>
                </div>
            </div>
            <!-- Seccion Categorias -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">Categorías</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=category_new" class="navbar-item">Nueva</a>
                    <a href="index.php?vista=category_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=category_search" class="navbar-item">Buscar</a>
                </div>
            </div>
            <!-- Seccion Productos -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">Productos</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=product_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=product_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=product_category" class="navbar-item">Por categoría</a>
                    <a href="index.php?vista=product_search" class="navbar-item">Buscar</a>
                </div>
            </div>
            <!-- Seccion Clientes -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">Clientes</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=cliente_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=cliente_list" class="navbar-item">Lista</a>
                </div>
            </div>
        </div>



        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class=" has-text-black is-size-5 has-text-weight-bold mr-5" href="index.php?vista=user_update&user_id_up=
                    <?php echo $_SESSION['id']; ?>">
                        Mi cuenta
                    </a>

                    <a class=" has-text-black is-size-5 has-text-weight-bold " href="index.php?vista=logout">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>