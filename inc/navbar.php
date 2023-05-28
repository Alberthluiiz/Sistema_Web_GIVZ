<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=home">
            <img src="./img/Logo_VinzuPal_Hor.png" width="65" height="28">
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
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">
                    <span class="icon">
                        <!-- <i class="fa fa-solid fa-user mr-5"></i> -->
                        <i class="fa fa-solid fa-users mr-5"></i>
                    </span>
                    Usuarios</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=user_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=user_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=user_search" class="navbar-item">Buscar</a>
                </div>
            </div>
            <!-- Seccion Categorias -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">
                    <span class=" icon">
                        <i class="fa fa-solid fa-tag mr-5"></i>
                    </span>
                    Categorías</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=category_new" class="navbar-item">Nueva</a>
                    <a href="index.php?vista=category_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=category_search" class="navbar-item">Buscar</a>
                </div>
            </div>
            <!-- Seccion Productos -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">
                    <span class="icon">
                        <!-- <i class="fa fa-solid fa-shop mr-5"></i> -->
                        <i class="fa fa-solid fa-box-open mr-5"></i>
                    </span>
                    Productos</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=product_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=product_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=product_category" class="navbar-item">Por categoría</a>
                    <a href="index.php?vista=product_search" class="navbar-item">Buscar</a>
                </div>
            </div>
            <!-- Seccion Clientes -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">
                    <span class="icon">
                        <i class="fa fa-solid fa-user mr-5"></i>
                    </span>
                    Clientes</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=cliente_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=cliente_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=cliente_search" class="navbar-item">Buscar</a>
                </div>
            </div>
            <!-- Seccion Ventas -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-black has-text-weight-bold is-size-6 ">
                    <span class="icon">
                        <i class="fa fa-solid fa-cart-shopping mr-5"></i>
                    </span>
                    Ventas</a>
                <div class="navbar-dropdown">
                    <a href="index.php?vista=venta_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=venta_list" class="navbar-item">Lista</a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class=" has-text-black is-size-5 has-text-weight-bold mr-5" href="index.php?vista=user_update&user_id_up=
                    <?php echo $_SESSION['id']; ?>">
                        <span class="icon">
                            <i class="fa-solid fa-circle-user mr-4"></i>
                        </span>
                        Mi cuenta
                    </a>
                    <!-- <a class=" has-text-black is-size-5 has-text-weight-bold " href="index.php?vista=logout">
                        Salir
                    </a> -->
                    <a href="index.php?vista=logout" class="ml-3 mr-4">
                        <span class="icon">
                            <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</nav>