<?php 

    include "../backEnd/modules/database.php";
    include "../backEnd/modules/consultas.php";
    $consultas = new consultas();

    $puestos = $consultas->getPuestos()['mensaje'];
    $sucursales =  $consultas->getSucursales()['mensaje'];
    

    include 'modules/root.php'; 
    $ruta = 'modules/pages/';

    $url=(isset($_GET['dir']))?$_GET['dir']:'login';

    switch ($url) {
        case 'home':
            session_start(); 
            if(isset($_SESSION["idUsuario"])){

                $idUsr = $_SESSION["idUsuario"];
                
                $infoUsr = $consultas->getUsuario($idUsr)['mensaje'];
                // $inventario= $consultas->getIventario()['mensaje'];


                $title  = "home";  
                $fondo = "fondo";
                $navar = true;
                $footer = true;

                $links = ['css/swiper.min.css'];

                include 'modules/components/header.php';
                include 'modules/components/nav.php';

                include $ruta.'home.php';
                $scripts = [
                    "js/swiper.min.js",
                    "js/homeComic.js", 
                    "js/app.js"
                ];
                
                include 'modules/components/footer.php'; 
            }else{
                $title  = "error404";  
                $fondo = "fondoHome";
                $navar = false;
                $footer = false;

                
                    include 'modules/components/header.php';
                
                        include "modules/pages/error404.php";
                
                    include 'modules/components/footer.php';
                
            }
        break;

        case 'comics':
            session_start(); 
            if(isset($_SESSION["idUsuario"])){

                $idUsr = $_SESSION["idUsuario"];
                $infoUsr = $consultas->getUsuario($idUsr)['mensaje'];


                $title  = "comics";
                $fondo = "fondoComics";
                $navar = true;
                $footer = true;

                $links = ['https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css'];

                include 'modules/components/header.php';
                include 'modules/components/nav.php';

                include $ruta.'listComic.php';

                $scripts = [ 
                    'js/apiComic.js',
                    'https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js', 
                    "js/app.js"           
                ];

                
                include 'modules/components/footer.php'; 
            }else{
                $title  = "error404";  
                $fondo = "fondoHome";
                $navar = false; 
                $footer = false;

                
                    include 'modules/components/header.php';
                
                        include "modules/pages/error404.php";
                
                    include 'modules/components/footer.php';
                
            }

        break;

        case 'comic':
            session_start(); 
            if(isset($_SESSION["idUsuario"])){

                $idUsr = $_SESSION["idUsuario"];
                $infoUsr = $consultas->getUsuario($idUsr)['mensaje'];

                $title  = "comic";
                $fondo = "fondoComic";
                $navar = true;
                $footer = true;

                $links = ['css/swiper.min.css'];


                include 'modules/components/header.php';
                include 'modules/components/nav.php';

                include $ruta.'infComic.php';
                $scripts = [
                    "js/swiper.min.js",
                    "js/comic.js",
                    "js/app.js"
                ];

                
                include 'modules/components/footer.php'; 
            }else{
                $title  = "error404";  
                $fondo = "fondoHome";
                $navar = false;
                $footer = false;

                
                    include 'modules/components/header.php';
                
                        include "modules/pages/error404.php";
                
                    include 'modules/components/footer.php';
                
            }

        break;

        case 'update':
            session_start(); 
            if(isset($_SESSION["idUsuario"])){

                $idUsr = $_SESSION["idUsuario"];
                $infoUsr = $consultas->getUsuario($idUsr)['mensaje'];

                $title  = "comic";
                $fondo = "fondoUpdate";
                $navar = true;
                $footer = true;


                $links = [
                    'https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css',
                ];

                
                include 'modules/components/header.php';
                include 'modules/components/nav.php';

                include $ruta.'updateUsr.php';
                $scripts = [ 
                    'https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js',           
                    "js/usrs.js",
                    "js/app.js"
            ];

                
                include 'modules/components/footer.php'; 
            }else{
                $title  = "error404";  
                $fondo = "fondo";
                $navar = false; 
                $footer = false;

                
                    include 'modules/components/header.php';
                
                        include "modules/pages/error404.php";
                
                    include 'modules/components/footer.php';
                
            }

        break;

        case 'login':
            $title  = "login";  
            $fondo = "fondoLogin";
            $navar = false;
            $footer = false;

            include 'modules/components/header.php';
            include 'modules/components/nav.php';

            include $ruta.'login.php';
            $scripts = [ "js/login.js" ];

            include 'modules/components/footer.php'; 

        break;

        default:
            $title  = "login";  
            $fondo = "fondoLogin";
            $navar = false;
            $footer = false;

            include 'modules/components/header.php';
            include 'modules/components/nav.php';

            include $ruta.'login.php';
            $scripts = [ "js/login.js" ];

            include 'modules/components/footer.php'; 
        break;
    }
    
?>