<?php

function OpenDB()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return new mysqli("127.0.0.1:3307", "root", "", "proyectogrupo1");
}

function CloseDB($conn)
{
    $conn->close();
}
