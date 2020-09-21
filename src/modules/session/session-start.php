<?php 
    session_start();

    $_SESSION["idUsuario"] = $_POST["idUsuario"];
    $_SESSION["puesto"] = $_POST["puesto"];

    $respusta["estatus"] = "ok";
    $respusta["mensaje"] = "se an creado las credenciales de sesión"; 

    echo json_encode($respusta);
?>