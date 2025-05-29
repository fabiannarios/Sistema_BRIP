<header>
<script src="./css/bootstrap-5.3.5-dist/js/bootstrap.bundle.js"></script>
    <div class="header-pequiven">
        <div class="contenedor-header">

            <div class="logo-pequiven">
                <a href="./inicio.php">
                    <img src="./css/img/logo.png" alt="">
                    <h2 class="titulo-header">Monitoreo de Incidencias</h2>
                </a>
            </div>

            <nav class="navbar-pequiven">

                <div class="dropdown">
                    <button class="pequiven-drop" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Equipos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="equipos.php">Ingresar equipos</a></li>
                        <li><a class="dropdown-item" href="repuesto.php">Respuestos</a></li>
                        

                    </ul>
                </div>


                <a class="nav-link link-header" href="./incidencias.php">Incidencias</a>
                <a class="nav-link link-header" href="./mantenimiento.php">Mantenimiento</a>
                

                <div class="dropdown">
                    <button class=" border border-white rounded-circle bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <i class='bx bx-user'></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item link-header" href="./config/logout.php">Cerrar sesion</a></li>
                        
                    </ul>
                
            </nav>
        </div>
    </div>

</header>