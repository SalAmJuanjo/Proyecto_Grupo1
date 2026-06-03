<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicio del sistema del Grupo 1.">
    <title>Inicio | Grupo 1</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                <a class="brand-mark" href="index.html" aria-label="Grupo 1 dashboard">
                    <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
                    <span class="brand-copy">
                        <span class="brand-title">Grupo 1</span>
                        <span class="brand-subtitle">Tarea 1</span>
                    </span>
                </a>
            </div>

            <nav class="sidebar-nav">
                <a class="nav-link active" href="index.html" aria-current="page">
                    <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                    <span class="nav-text">Panel</span>
                </a>
                <a class="nav-link" href="users.html">
                    <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                    <span class="nav-text">Usuarios</span>
                </a>
                <a class="nav-link" href="add-user.html">
                    <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
                    <span class="nav-text">Agregar Usuario</span>
                </a>
                <a class="nav-link" href="profile.html">
                    <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
                    <span class="nav-text">Perfil</span>
                </a>
                <a class="nav-link" href="charts.html">
                    <span class="nav-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
                    <span class="nav-text">Gráficos</span>
                </a>
                <a class="nav-link" href="tables.html">
                    <span class="nav-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
                    <span class="nav-text">Tablas</span>
                </a>
                <a class="nav-link" href="forms.html">
                    <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
                    <span class="nav-text">Formas</span>
                </a>
                <a class="nav-link" href="components.html">
                    <span class="nav-icon"><i class="bi bi-grid-3x3-gap" aria-hidden="true"></i></span>
                    <span class="nav-text">Componentes</span>
                </a>
                <a class="nav-link" href="alerts.html">
                    <span class="nav-icon"><i class="bi bi-exclamation-triangle" aria-hidden="true"></i></span>
                    <span class="nav-text">Alertas</span>
                </a>
                <a class="nav-link" href="modals.html">
                    <span class="nav-icon"><i class="bi bi-window-stack" aria-hidden="true"></i></span>
                    <span class="nav-text">Modales</span>
                </a>
                <a class="nav-link" href="settings.html">
                    <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
                    <span class="nav-text">Configuración</span>
                </a>
                <a class="nav-link" href="blank.html">
                    <span class="nav-icon"><i class="bi bi-file-earmark" aria-hidden="true"></i></span>
                    <span class="nav-text">Página en blanco</span>
                </a>
            </nav>

            <div class="sidebar-user">
                <strong>Grupo 1</strong>
                <small>Zona de trabajo</small>
            </div>

            <div class="sidebar-footer">
                <span class="status-dot"></span>
                <span class="sidebar-footer-text">El sistema funciona sin problemas</span>
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
                        <input class="form-control search-input" type="search" placeholder="Search users, orders, reports" aria-label="Search">
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
                                <li><a class="dropdown-item" href="login.php">Cerrar sesión</a></li>
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
                                <p class="eyebrow mb-1">Overview</p>
                                <h1 class="h3 mb-1">Dashboard</h1>
                                <p class="text-muted mb-0">Monitor performance, sales, users, and support from one clean workspace.</p>
                            </div>
                        </div>
                        <div class="heading-actions"><button class="btn btn-outline-secondary btn-sm" type="button"><i class="bi bi-download" aria-hidden="true"></i> Export</button><button class="btn btn-primary btn-sm" type="button"><i class="bi bi-file-earmark-plus" aria-hidden="true"></i> Create Report</button></div>
                    </div>

                    <section class="row g-3 mt-1" aria-label="Dashboard metrics">
                        <div class="col-12 col-sm-6 col-xl-3">
                            <article class="metric-card metric-primary">
                                <div class="metric-top">
                                    <span class="metric-label">Revenue</span>
                                    <span class="metric-icon"><i class="bi bi-currency-dollar" aria-hidden="true"></i></span>
                                </div>
                                <div class="metric-value">$48,240</div>
                                <div class="metric-meta">
                                    <span class="text-success">+12.5%</span>
                                    <span>from last month</span>
                                </div>
                            </article>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                            <article class="metric-card metric-success">
                                <div class="metric-top">
                                    <span class="metric-label">Orders</span>
                                    <span class="metric-icon"><i class="bi bi-bag-check" aria-hidden="true"></i></span>
                                </div>
                                <div class="metric-value">1,284</div>
                                <div class="metric-meta">
                                    <span class="text-success">+8.2%</span>
                                    <span>new orders</span>
                                </div>
                            </article>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                            <article class="metric-card metric-warning">
                                <div class="metric-top">
                                    <span class="metric-label">Customers</span>
                                    <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                                </div>
                                <div class="metric-value">8,742</div>
                                <div class="metric-meta">
                                    <span class="text-success">+5.1%</span>
                                    <span>active users</span>
                                </div>
                            </article>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                            <article class="metric-card metric-danger">
                                <div class="metric-top">
                                    <span class="metric-label">Tickets</span>
                                    <span class="metric-icon"><i class="bi bi-life-preserver" aria-hidden="true"></i></span>
                                </div>
                                <div class="metric-value">36</div>
                                <div class="metric-meta">
                                    <span class="text-danger">3 urgent</span>
                                    <span>need review</span>
                                </div>
                            </article>
                        </div>
                    </section>

                    <section class="row g-3 mt-1">
                        <div class="col-12 col-xl-8">
                            <div class="panel">
                                <div class="panel-header">
                                    <div>
                                        <h2 class="h5 mb-1 section-title"><i class="bi bi-graph-up-arrow" aria-hidden="true"></i><span>Sales Performance</span></h2>
                                        <p class="text-muted mb-0">Monthly revenue compared with operational targets.</p>
                                    </div>
                                    <a class="btn btn-light btn-sm" href="charts.html">View Details</a>
                                </div>

                                <div class="chart-bars" aria-label="Sales performance chart">
                                    <div class="chart-column bar-42"><span></span><small>Jan</small></div>
                                    <div class="chart-column bar-58"><span></span><small>Feb</small></div>
                                    <div class="chart-column bar-51"><span></span><small>Mar</small></div>
                                    <div class="chart-column bar-72"><span></span><small>Apr</small></div>
                                    <div class="chart-column bar-66"><span></span><small>May</small></div>
                                    <div class="chart-column bar-83"><span></span><small>Jun</small></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xl-4">
                            <div class="panel h-100">
                                <div class="panel-header">
                                    <div>
                                        <h2 class="h5 mb-1 section-title"><i class="bi bi-activity" aria-hidden="true"></i><span>Team Activity</span></h2>
                                        <p class="text-muted mb-0">Recent operational updates.</p>
                                    </div>
                                </div>

                                <div class="activity-list">
                                    <div class="activity-item"><span class="activity-dot bg-primary"></span>
                                        <div>
                                            <p class="mb-1 fw-semibold">New campaign launched</p>
                                            <p class="text-muted small mb-0">Marketing team published the May offer.</p>
                                        </div>
                                    </div>
                                    <div class="activity-item"><span class="activity-dot bg-success"></span>
                                        <div>
                                            <p class="mb-1 fw-semibold">Payment batch cleared</p>
                                            <p class="text-muted small mb-0">246 invoices were processed successfully.</p>
                                        </div>
                                    </div>
                                    <div class="activity-item"><span class="activity-dot bg-warning"></span>
                                        <div>
                                            <p class="mb-1 fw-semibold">Support queue rising</p>
                                            <p class="text-muted small mb-0">Average first response time is 18 minutes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="panel mt-3">
                        <div class="panel-header">
                            <div>
                                <h2 class="h5 mb-1 section-title"><i class="bi bi-people" aria-hidden="true"></i><span>Usuarios recientes</span></h2>
                                <p class="text-muted mb-0">Ultima actividad de los usuarios.</p>
                            </div>
                            <a class="btn btn-outline-secondary btn-sm" href="users.html">Manejar Usuarios</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Team</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Joined</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img class="avatar-img avatar-sm" src="images/avatar/avatar-1.jpg" alt="Sarah Ahmed">
                                                <div>
                                                    <p class="fw-semibold mb-0">Sarah Ahmed</p>
                                                    <p class="text-muted small mb-0">sarah@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Admin</td>
                                        <td>Operations</td>
                                        <td><span class="badge text-bg-success">Active</span></td>
                                        <td>Jan 12, 2026</td>
                                        <td class="text-end"><a class="btn btn-light btn-sm" href="user-details.html">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img class="avatar-img avatar-sm" src="images/avatar/avatar-2.jpg" alt="Rafi Khan">
                                                <div>
                                                    <p class="fw-semibold mb-0">Rafi Khan</p>
                                                    <p class="text-muted small mb-0">rafi@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Manager</td>
                                        <td>Sales</td>
                                        <td><span class="badge text-bg-success">Active</span></td>
                                        <td>Feb 03, 2026</td>
                                        <td class="text-end"><a class="btn btn-light btn-sm" href="user-details.html">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img class="avatar-img avatar-sm" src="images/avatar/avatar-3.jpg" alt="Nadia Islam">
                                                <div>
                                                    <p class="fw-semibold mb-0">Nadia Islam</p>
                                                    <p class="text-muted small mb-0">nadia@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Editor</td>
                                        <td>Content</td>
                                        <td><span class="badge text-bg-warning">Pending</span></td>
                                        <td>Mar 18, 2026</td>
                                        <td class="text-end"><a class="btn btn-light btn-sm" href="user-details.html">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img class="avatar-img avatar-sm" src="images/avatar/avatar-4.jpg" alt="Mina Torres">
                                                <div>
                                                    <p class="fw-semibold mb-0">Mina Torres</p>
                                                    <p class="text-muted small mb-0">mina@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Viewer</td>
                                        <td>Finance</td>
                                        <td><span class="badge text-bg-secondary">Suspended</span></td>
                                        <td>Apr 07, 2026</td>
                                        <td class="text-end"><a class="btn btn-light btn-sm" href="user-details.html">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img class="avatar-img avatar-sm" src="images/avatar/avatar-5.jpg" alt="Jon Oliver">
                                                <div>
                                                    <p class="fw-semibold mb-0">Jon Oliver</p>
                                                    <p class="text-muted small mb-0">jon@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Analyst</td>
                                        <td>Data</td>
                                        <td><span class="badge text-bg-success">Active</span></td>
                                        <td>Apr 22, 2026</td>
                                        <td class="text-end"><a class="btn btn-light btn-sm" href="user-details.html">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </main>

            <footer class="Grupo1-footer">
                <div class="container-fluid px-3 px-lg-4">
                    <span>Copyright 2026 Grupo 1. <br> Developed by <a target="_blank" class="fw-bold text-success">Juan José Salas Amador</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">Ambiente Web Cliente/Servidor</a> </span>

                </div>
            </footer>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>