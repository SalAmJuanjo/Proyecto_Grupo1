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


