<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/InicioController.php';

function ValidarSesionInterna()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['ConsecutivoUsuario']) || !isset($_SESSION['NombreUsuario'])) {
        header('Location: ../vInicio/IniciarSesion.php');
        exit();
    }
}

function ObtenerRolActual()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $rol = $_SESSION['ConsecutivoRol'] ?? $_SESSION['NombreRol'] ?? 0;

    if (is_numeric($rol)) {
        return (int) $rol;
    }

    if (is_string($rol)) {
        $rolNormalizado = strtolower(trim($rol));

        if ($rolNormalizado === 'administrador' || $rolNormalizado === 'admin' || $rolNormalizado === '1') {
            return 1;
        }

        if ($rolNormalizado === 'inspector' || $rolNormalizado === '2') {
            return 2;
        }
    }

    return 0;
}

function TienePermiso($rolesPermitidos)
{
    $rolActual = ObtenerRolActual();
    return in_array($rolActual, $rolesPermitidos, true);
}

function ValidarRol($rolesPermitidos)
{
    ValidarSesionInterna();

    if (!TienePermiso($rolesPermitidos)) {
        http_response_code(403);
        exit('No tiene permisos para acceder a esta sección.');
    }
}

ValidarSesionInterna();

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
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
                <div class="navbar-actions ms-auto">
                    <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme">
                        <i class="bi bi-moon-stars" data-theme-icon></i>
                    </button>
                    <div class="dropdown">
                        <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="">' . $nombreUsuario . '</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end user-menu">
                            <li>
                                <a class="dropdown-item user-menu-item" href="../vUsuario/Perfil.php">
                                    <i class="ti ti-user me-2"></i>
                                    Mi perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item user-menu-item" href="../vUsuario/CambiarContrasenna.php">
                                    <i class="ti ti-shield-lock me-2"></i>
                                    Seguridad
                                </a>
                            </li>
                            <li>
                                <form action="" method="POST" class="d-grid">
                                    <button id="btnSalir" name="btnSalir" type="submit" class="dropdown-item user-menu-item text-start">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                                        Salir
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        ';
}

function Sidebar()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $rolActual = ObtenerRolActual();

    echo '
        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                <h5 class="text-center mt-3">Centro de gestión</h5>
            </div>
            <nav class="sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="../vInicio/Principal.php">Inicio</a></li>';

    if (TienePermiso([1])) {
        echo '
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/RegistrarPuente.php">Registrar puente</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/RealizarInspeccion.php">Nueva inspección</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/DashboardGeneral.php">Dashboard general</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/HerramientaPriorizacion.php">Herramientas de priorización</a></li>';
    } elseif (TienePermiso([2])) {
        echo '
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/RegistrarPuente.php">Registrar puente</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vFunciones/RealizarInspeccion.php">Nueva inspección</a></li>';
    }

    echo '
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