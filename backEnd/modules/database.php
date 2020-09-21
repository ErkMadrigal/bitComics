<?php
    class database{

        //<-------------Local------------>
        // private $host = "localhost";
        // private $user = "root";
        // private $password = "";
        // private $db = "bitcomics";

        //<-------------En la Nube cleverCLoud------------>
        private $host = "bbqimfhllwle3c1zu8th-mysql.services.clever-cloud.com";
        private $user = "ubmxablztulchjck";
        private $password = "BGMqK74NsE64GNVrMlmi";
        private $db = "bbqimfhllwle3c1zu8th";

        public function getConnection(){
            $dbc = new PDO("mysql:host=$this->host;dbname=$this->db;",$this->user,$this->password);
            return $dbc;
        } 

    }
?>