<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/DashboardModel.php';


function ConsultarDashboardController()
{
    return ConsultarDashboardModel();
}