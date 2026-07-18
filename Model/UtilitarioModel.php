<?php

function OpenDB()
{
    //los puertos son diferentes 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return new mysqli("127.0.0.1:3306", "root", "", "proyectogrupo1");
}

function CloseDB($conn)
{
    $conn->close();
}
