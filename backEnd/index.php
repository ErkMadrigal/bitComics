<?php
    $respuesta = null;
    include "modules/database.php";
    include "modules/inserciones.php";
    include "modules/consultas.php";
    include "modules/metodos-extra.php";

    $inserciones = new inserciones();
    $metodosExtra = new metodosExtra();
    $consultas = new consultas();

    
    $opcion=(isset($_POST["opcion"]))?$_POST["opcion"]:' ';

    // $opcion = $_POST["opcion"];

    switch( $opcion ){
        case "registrar":
            $name = ( $_POST['name'] !== "" ) ? $_POST['name'] : null ;
            $apellido = ( $_POST['apellido'] !== "" ) ? $_POST['apellido'] : null ;
            $email = ( $_POST['email'] !== "" ) ? $_POST['email'] : null ;
            $telefono = ( $_POST['telefono'] !== "" ) ? $_POST['telefono'] : null ;
            $sucursal = ( $_POST['sucursal'] !== "") ? $_POST['sucursal'] : null;
            $puesto = ( $_POST['puesto'] !== "") ? $_POST['puesto'] : null;
            $nameUsr = ( $_POST['user'] !== "") ? $_POST['user'] : null;
            $status = 1;
            
            $password = ( $_POST['password'] !== "") ? $_POST['password'] : null;
            $pass = $metodosExtra->cifrarPassword( $password );

            $imagenPerfil = $_FILES['imagenPerfil'];            
            $img = $metodosExtra->img($imagenPerfil);

            $errores = [];
            
            if( $metodosExtra->isName($name) === 0 ){
                $errores[] = "por favor ingresa un nombre valido";
            }
            if( $metodosExtra->isName($apellido) === 0 ){
                $errores[] = "por favor ingresa un apellido valido";
            }
            if( $metodosExtra->isMail( $email ) === 0) {
                $errores[] = "ingresa un correo valido";
            }
            if( $metodosExtra->isPhone( $telefono ) === 0) {
                $errores[] = "ingresa un numero valido";
            }
            if( $metodosExtra->isNameUser($nameUsr) === 0 ){
                $errores[] = "ingresa un nombre de usuario (alfanumerico) valido";
            }
            if(count($errores) === 0){
                $validarUsuario = $consultas->userValidate($email, $name, $apellido, $nameUsr, $telefono);
                if(!$validarUsuario){
                    $respuesta = $inserciones->registrarUsuario($name, $apellido, $email, $telefono, $sucursal, $puesto, $status, $pass, $img, $nameUsr);
                }else{
                    $respuesta = "el usuario ya existe";
                }
                $respuesta;
            }else{
                $respuesta = $errores;
            }


        break;

        case "login":
            $password = $_POST["password"];
            $sucursal = $_POST["sucursal"];

            $email = ($metodosExtra->isMail($_POST["usr"]) === 1 ) ? $_POST["usr"] : '';
            $telefono = ($metodosExtra->isPhone($_POST["usr"]) === 1 ) ? $_POST["usr"] : '';
            $nameUser = ($metodosExtra->isNameUser($_POST["usr"]) === 1 ) ? $_POST["usr"] : '';

            $respuesta = $consultas->loginUsuario($email, $telefono, $nameUser, $sucursal, $password);
        break;

        case "getUsrs":
            $respuesta = $consultas->getUsers($_POST["idUsr"]);
        break;

        case "status":
            $respuesta = $consultas->editarStatus($_POST["idUsr"], $_POST["value"], $_POST['nombre']);
        break;

        case "eliminar":
            $respuesta = $consultas->eliminarUsr($_POST["idUsr"], $_POST['nombre']);
        break;

        case "editarUsuarior":
            $name = ( $_POST['name'] !== "" ) ? $_POST['name'] : null ;
            $apellido = ( $_POST['apellido'] !== "" ) ? $_POST['apellido'] : null ;
            $email = ( $_POST['email'] !== "" ) ? $_POST['email'] : null ;
            $telefono = ( $_POST['telefono'] !== "" ) ? $_POST['telefono'] : null ;
            $nameUsr = ( $_POST['user'] !== "") ? $_POST['user'] : null;

            $id = ( $_POST["idUsuario"] !== "") ? $_POST["idUsuario"] : null;
            $nombre = ( $_POST['nombreUsuario'] !== "") ? $_POST['nombreUsuario'] : null;

            $errores = [];
            
            if( $metodosExtra->isName($name) === 0 ){
                $errores[] = "por favor ingresa un nombre valido";
            }
            if( $metodosExtra->isName($apellido) === 0 ){
                $errores[] = "por favor ingresa un apellido valido";
            }
            if( $metodosExtra->isMail( $email ) === 0) {
                $errores[] = "ingresa un correo valido";
            }
            if( $metodosExtra->isPhone( $telefono ) === 0) {
                $errores[] = "ingresa un numero valido";
            }
            if( $metodosExtra->isNameUser($nameUsr) === 0 ){
                $errores[] = "ingresa un nombre de usuario (alfanumerico) valido";
            }

            if(count($errores) === 0){
                $respuesta = $consultas->editarUsr($name, $apellido, $email, $telefono, $nameUsr, $id, $nombre);
            }else{
                $respuesta = $errores;
            }
        break;
        
        default:
            $respuesta = "hola mundo";            
        break;
    }
   


    echo json_encode($respuesta);
?>