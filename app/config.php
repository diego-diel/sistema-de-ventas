<?php
if (!defined('SERVIDOR')) {
    define('SERVIDOR', 'localhost');
}

if (!defined('USUARIO')) {
    define('USUARIO', 'root');
}

if (!defined('PASSWORD')) {
    define('PASSWORD', '');
}

if (!defined('BD')) {
    define('BD', 'sistemadeventas');
}

// Resto del código...

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "La conexión a la base de datos fue con éxito";
} catch (PDOException $e) {
    //print_r($e);
    echo "Error al conectar a la base de datos";
}

$URL = "http://localhost/www.sistemadeventas.com";

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d H:i:s');


