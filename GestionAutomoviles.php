<?php
/*
 * Servicio Web en PHP por Jose Hernández
 * https://josehernandez.es/2011/01/18/servicio-web-php.html
 */

class GestionAutomoviles {
     

    public function ConectarMarcas() {
        try {
            $user = "epiz_26867140";  // usuario con el que se va conectar con MySQL
            $pass = "EMpy1KxgpENxQs";  // contraseña del usuario
            $dbname = "epiz_26867140_coches";  // nombre de la base de datos
            $host = "sql306.epizy.com";  // nombre o IP del host

            $db = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $pass);  //conectar con MySQL y SELECCIONAR LA Base de Datos
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //Manejo de errores con PDOException
            //echo "<p>Se ha conectado a la BD $dbname.</p>\n";
            return $db;
        } catch (PDOException $e) {  // Si hubieran errores de conexión, se captura un objeto de tipo PDOException
            print "<p>Error: No se pudo conectar con la BD $dbname.</p>\n";
            print "<p>Error: " . $e->getMessage() . "</p>\n";  // mensaje de excepción
            exit();  // terminar si no hay conexión $db
        }
    }

    public function TestBD() {
        $con = $this->ConectarMarcas();
    }

    public function ObtenerMarcas() {
        $con = $this->ConectarMarcas();
        $marcas = array();
        if ($con) {
            $result = $con->query('select id, marca from marcas');

            while ($row = $result->fetch(PDO::FETCH_ASSOC))
                $marcas[$row['id']] = $row['marca'];
        }
        return $marcas;
    }

     public function ObtenerModelos($marca) {
        $query = "SELECT id, modelo FROM modelos WHERE marca = (SELECT id from marcas WHERE
                                                                marca = '".$marca."')";
        $con = $this->ConectarMarcas();
        $modelos = array();
        if ($con) {
            $result = $con->query($query);

           while ($row = $result->fetch(PDO::FETCH_ASSOC))
               $modelos[$row['id']] = $row['modelo'];
        }
        return $modelos;
        /* SELECT modelo FROM modelos join marcas on marcas.id = modelos.marca where marcas.marca = 'Ford'; */
    } 

    public function ObtenerUrl() {
        $con = $this->ConectarMarcas();
        $url = array();
        if ($con) {
            $result = $con->query('select marca, url from marcas');

            while ($row = $result->fetch(PDO::FETCH_ASSOC))
                $url[$row['marca']] = $row['url'];
        }
        return $url;
    }


}
