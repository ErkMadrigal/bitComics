<?php 
    class consultas{

        public function userValidate( $email, $name, $apellido, $nameUsr, $telefono){
            $response  = null;
            try{
                $sql = "SELECT * FROM usuarios WHERE  correo = :correo AND nombreUsuario = :nombreUsuario AND apellidosUsuario = :apellidosUsuario
                                                        AND telefono = :telefono AND nombreUser = :nombreUser";
                $database = new database();
                
                $dbc = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":correo",$email);
                $stmt->bindParam(":nombreUsuario",$name);
                $stmt->bindParam(":apellidosUsuario",$apellido);
                $stmt->bindParam(":telefono", $telefono);
                $stmt->bindParam(":nombreUser", $nameUsr);
                $stmt->execute();
                $count = $stmt->rowCount();
                $response  = ( $count > 0  ) ? true : false;
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }

        public function loginUsuario( $email, $telefono, $nameUser, $sucursal, $password){
            $respuesta = null;

            $concat1 = ($telefono == '') ? '' : "telefono = '$telefono' "; 
            $concat2 = ($email == '') ? '' : "correo = '$email' "; 
            $concat3 = ($nameUser == '') ? '' : "nombreUser = '$nameUser' "; 

            try{
                $sql = "SELECT idUsuario, password, sucursal, status, puesto FROM usuarios WHERE ".$concat1." ".$concat2." ".$concat3." AND sucursal = ".$sucursal;
                $database = new database();
                $stmt = $database->getConnection()->query($sql);
                $informacionUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
                if($informacionUsuario){
                    if($informacionUsuario['status']){
                            if(password_verify($password, $informacionUsuario["password"])){
                                $respuesta["estatus"] = "ok";
                                $respuesta["mensaje"] = [
                                    "puesto" =>  $informacionUsuario["puesto"],
                                    "idUsuario" =>  $informacionUsuario["idUsuario"]
                                ];
                            }else{
                                $respuesta["estatus"] = "error";
                                $respuesta["mensaje"] = "tienes un error en la contraseña, por favor de verificar";
                            }
                    }else{
                        $respuesta["estatus"] = "error";
                        $respuesta["mensaje"] = "tu cuenta esta inactiva, contacta el gerente para verificarlo";
                    }
                }else{
                    $respuesta["estatus"] = "error";
                    $respuesta["mensaje"] = "tu cuenta no existe o puede ser que no sea tu sucursal";
                }
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;

        } 

        public function getUsers($idUsers){
            $respuesta = null;
            try {
                $sql = "SELECT * FROM usuarios INNER JOIN puestos ON puestos.idPuesto=usuarios.puesto 
                        INNER JOIN sucursal ON sucursal.idSucursal = usuarios.sucursal 
                        WHERE usuarios.idUsuario != :idUsuario ORDER BY usuarios.apellidosUsuario";

                $database = new database();
                $dbc = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":idUsuario", $idUsers);
                $stmt->execute();
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;
        }
    
        public function editarStatus($idUsuario, $value, $nombre){
            $respuesta = null;

            try{
                $sql = "UPDATE usuarios SET status = :status WHERE idUsuario = :idUsuario";
                $database = new database();
                $dbc  = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":idUsuario", $idUsuario);
                $stmt->bindParam(":status", $value);
                $stmt->execute();
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = "se ha actualizado estatus al usuario ${nombre}";
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;
        }

        public function eliminarUsr( $idUsuario , $nombre ){
            $respuesta = null;
            try{
                $sql = "DELETE FROM usuarios WHERE idUsuario = :idUsuario";
                $database = new database();
                $dbc  = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":idUsuario",$idUsuario);
                $stmt->execute();
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = "Se ha eliminado el usuario con el nombre: {$nombre}";
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;
        }

        public function editarUsr($name, $apellido, $email, $telefono, $nameUsr, $id, $nombre){
            $respuesta = null;

            $sql = "UPDATE usuarios SET nombreUsuario = :nombreUsuario, apellidosUsuario = :apellidosUsuario, 
                            telefono = :telefono, correo = :correo, nombreUser = :nombreUser  WHERE idUsuario = :idUsuario ";

            try{
                $sql = "UPDATE usuarios SET status = :status WHERE idUsuario = :idUsuario";
                $database = new database();
                $dbc  = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":nombreUsuario", $name);
                $stmt->bindParam(":apellidosUsuario", $apellido);
                $stmt->bindParam(":telefono", $telefono);
                $stmt->bindParam(":correo", $email);
                $stmt->bindParam(":nombreUser", $nameUsr);
                $stmt->bindParam(":idUsuario", $id);
                $stmt->execute();
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = "se han actualizado los datos del usuario ${nombre}";
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;
        }

        public function getUsuario( $idUsuario ){
            $respuesta = null;
            try{
                $sql = "SELECT * FROM usuarios INNER JOIN puestos ON puestos.idPuesto=usuarios.puesto 
                INNER JOIN sucursal ON sucursal.idSucursal = usuarios.sucursal
                WHERE idUsuario = :idUsuario";
                
                $database = new database();
                $dbc  = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":idUsuario", $idUsuario);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = $data;
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;

        }

        public function getPuestos(){
            $respuesta = null;
            try{
                $sql = "SELECT * FROM puestos";
                $database = new database();
                $dbc  = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = $data;
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;
        }

        public function datoComic($comic){
            $respuesta = null;
            try{
                $sql = "SELECT * FROM sucursal INNER JOIN inventario ON sucursal.idSucursal = inventario.sucursal WHERE inventario.inventario = :inventario";
                $database = new database();
                $dbc  = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":inventario", $comic);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = $data;
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;
        }

        public function getSucursales(){
            $respuesta = null;
            try{
                $sql = "SELECT * FROM sucursal";
                $database = new database();
                $dbc  = $database->getConnection();
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(":inventario", $comic);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = $data;
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }
            return $respuesta;
        }
    }

?>