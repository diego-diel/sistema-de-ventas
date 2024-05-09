<?php
session_start();
include('../../config.php');

// Verifica si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre_cliente = $_POST['nombre_cliente'];
    $nit_ci_cliente = $_POST['nit_ci_cliente'];
    $celular_cliente = $_POST['celular_cliente'];
    $email_cliente = $_POST['email_cliente'];

    // Prepara la consulta SQL para insertar los datos en la base de datos
    $sentencia = $pdo->prepare("INSERT INTO tb_clientes (nombre_cliente, nit_ci_cliente, celular_cliente, email_cliente, fyh_creacion) 
                                VALUES (:nombre_cliente, :nit_ci_cliente, :celular_cliente, :email_cliente, NOW())");

    // Enlaza los parámetros de la consulta
    $sentencia->bindParam(':nombre_cliente', $nombre_cliente);
    $sentencia->bindParam(':nit_ci_cliente', $nit_ci_cliente);
    $sentencia->bindParam(':celular_cliente', $celular_cliente);
    $sentencia->bindParam(':email_cliente', $email_cliente);

    // Ejecuta la consulta
    if ($sentencia->execute()) {
        $_SESSION['mensaje'] = "Cliente registrado exitosamente";
        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al registrar el cliente en la base de datos";
        $_SESSION['icono'] = "error";
    }
} else {
    // Redirige si no se recibieron los datos del formulario
    $_SESSION['mensaje'] = "Error: No se recibieron datos del formulario";
    $_SESSION['icono'] = "error";
}

// Redirige de vuelta al formulario de agregar clientes
header('Location: ' . $URL . '/ventas/create.php');
exit();
?>
