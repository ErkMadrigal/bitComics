<?php 
    session_start();
    session_unset();
    session_destroy();

    $respusta["estatus"] = "ok";
    $respusta["mensaje"] = "eliminado las credenciales de la sesión"; 

    echo json_encode($respusta);
?>