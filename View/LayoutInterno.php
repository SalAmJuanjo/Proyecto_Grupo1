<?php

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

function ThemeToggleButton()
{
    echo '
        <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme">
            <i class="bi bi-moon-stars" data-theme-icon></i>
        </button>
    ';
}

function Navbar()
{
    echo '
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Registrar puente</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Nueva inspección</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Dashboard general</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Herramientas de priorización</a></li>

            </ul>
        </nav>
    ';
}
