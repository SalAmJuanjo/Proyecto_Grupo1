<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/InicioController.php';

function ImportCSS()
{
    echo '
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyecto Web | Grupo 1</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        </head>
        
    ';
}

function ImportJS()
{
    echo '
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/main.js"></script>
    ';
}

function navbar()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $nombreUsuario = isset($_SESSION['NombreUsuario'])
        ? htmlspecialchars($_SESSION['NombreUsuario'], ENT_QUOTES, 'UTF-8')
        : 'Usuario';

    echo '
        <nav class="navbar admin-navbar navbar-expand bg-white">
            <div class="container-fluid px-3 px-lg-4">
                <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
                    <input class="form-control search-input" type="search" placeholder="Buscar reportes de puentes" aria-label="Search">
                </form>

                <div class="navbar-actions ms-auto">
                    <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme">
                        <i class="bi bi-moon-stars" data-theme-icon></i>
                    </button>
                    <div class="dropdown">
                        <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <span class="">' . $nombreUsuario . '</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item">Perfil</a></li>
                            <li><a class="dropdown-item">Configuración de cuenta</a></li>
                            <form action="" method="POST">
                                <button id="btnSalir" name="btnSalir" type="submit" class="btn btn-sm bg-transparent border-0 text-start py-1 fs-6">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                        Salir
                                </button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        ';
}

function aside()
{
    echo '
        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                <h5 class="text-center mt-3">Centro de gestión</h5>
            </div>
            <nav class="sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="../vInicio/Principal.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/RegistrarPuente.php">Registrar puente</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/RealizarInspeccion.php">Nueva inspección</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/DashboardGeneral.php">Dashboard general</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/HerramientaPriorizacion.php">Herramientas de priorización</a></li>
                </ul>
             </nav>
            <div class="sidebar-user">
            </div>
        </aside>
    ';
}

function footer()
{
    echo '
        <footer class="Grupo1-footer">
            <div class="container-fluid px-3 px-lg-4">
                <span>Copyright 2026 Grupo 1. <br> Developed by <a target="_blank" class="fw-bold text-success">Grupo 1</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">Ambiente Web Cliente/Servidor</a></span>
            </div>
        </footer>
    ';
}
