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
        <button class="icon-button theme-toggle auth-theme-toggle" type="button" data-theme-toggle
        aria-label="Switch color theme" title="Switch color theme">
        <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
        </button>
    ';
}

function Titulo()
{
    echo '
        <div class="text-center mb-3">
            <div class="mb-1"
                style="width:72px;height:72px; margin: 0 auto;">
                <i class="bi bi-diagram-3-fill text-primary fs-2"></i>
            </div>

            <h1 class="fw-bold h1 mb-0 text-dark">
                Smart<span class="text-primary">Bridge</span>
            </h1>
            <p class="text-muted mt-1 mb-0">Gestión de puentes</p>
        </div>
    ';
    
}

