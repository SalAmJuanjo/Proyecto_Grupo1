<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/View/LayoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php ImportCSS(); ?>
<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                
            </div>

            <nav class="sidebar-nav">
                
            </nav>

            <div class="sidebar-user">
                <strong>PuenTech</strong>
                <small>Zona de trabajo</small>
            </div>

            
        </aside>

        <div class="admin-main">
            <nav class="navbar admin-navbar navbar-expand bg-white">
                <div class="container-fluid px-3 px-lg-4">
                    <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
                        <input class="form-control search-input" type="search" placeholder="Buscar reportes de puentes" aria-label="Search">
                    </form>
                    <div class="navbar-actions ms-auto">
                        <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
                            <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
                        </button>
                        <div class="dropdown">
                            <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="profile-name d-none d-sm-inline">Admin Grupo 1</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item">Perfil</a></li>
                                <li><a class="dropdown-item">Configuración de cuenta</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="dashboard-content">
                <div class="container-fluid px-3 px-lg-4 py-4">
                    <div class="page-heading">
                        <div class="page-heading-copy">
                            <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                            <div>
                                <p class="eyebrow mb-1">Proyecto Grupo 1</p>
                                <h1 class="h3 mb-1">PuenTech</h1>
                                <p class="text-muted mb-0">Puentes.</p>
                            </div>
                        </div>
                        <div class="heading-actions"><button class="btn btn-outline-secondary btn-sm" type="button"><i class="bi bi-download" aria-hidden="true"></i> Export</button><button class="btn btn-primary btn-sm" type="button"><i class="bi bi-file-earmark-plus" aria-hidden="true"></i> Create Report</button></div>
                    </div>
                    
                </div>
            </main>
            <footer class="Grupo1-footer">
                <div class="container-fluid px-3 px-lg-4">
                    <span>Copyright 2026 Grupo 1. <br> Developed by <a target="_blank" class="fw-bold text-success">Grupo 1</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">Ambiente Web Cliente/Servidor</a> </span>

                </div>
            </footer>
        </div>
    </div>
    <?php ImportJS(); ?> 
</body>
</html>