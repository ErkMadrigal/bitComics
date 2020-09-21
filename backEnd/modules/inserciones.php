<?php
    class inserciones{

        public function registrarUsuario($name, $apellido, $email, $telefono, $sucursal, $puesto, $status, $pass, $img, $nameUsr){

            $respuesta = null;

            try{
                $sql = "INSERT INTO usuarios(nombreUsuario, apellidosUsuario, puesto, avatar, telefono, correo, password, sucursal, status, nombreUser) 
                                    VALUES (:nombreUsuario, :apellidosUsuario, :puesto, :avatar, :telefono, :correo, 
                                            :password, :sucursal, :status, :nombreUser)";

                $database = new database();
                $db = $database->getConnection();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nombreUsuario", $name);
                $stmt->bindParam(":apellidosUsuario", $apellido);
                $stmt->bindParam(":puesto", $puesto);
                $stmt->bindParam(":avatar", $img);
                $stmt->bindParam(":telefono", $telefono);
                $stmt->bindParam(":correo", $email);
                $stmt->bindParam(":password", $pass);
                $stmt->bindParam(":sucursal", $sucursal);
                $stmt->bindParam(":status", $status);
                $stmt->bindParam(":nombreUser", $nameUsr);
                $stmt->execute();
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = "La cuenta se ha registrado con el usuario ${name}";
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }

            return $respuesta;
        }
    }
?>