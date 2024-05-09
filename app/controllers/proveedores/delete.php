<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 10:19
 */

include ('../../config.php');

    $id_proveedor = $_GET['id_proveedor'];

    $sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor=:id_proveedor ");

    $sentencia->bindParam('id_proveedor',$id_proveedor);
    if($sentencia->execute()){
        session_start();
        // echo "se registro correctamente";
        $_SESSION['mensaje'] = "Se Elimino al proveedor de la manera correcta";
        $_SESSION['icono'] = "success";
        // header('Location: '.$URL.'/categorias/');
        ?>
        <script>
            location.href = "<?php echo $URL;?>/proveedores";
        </script>
        <?php
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo Eliminar  en la base de datos";
        $_SESSION['icono'] = "error";
        //  header('Location: '.$URL.'/categorias');
        ?>
        <script>
            location.href = "<?php echo $URL;?>/proveedores";
        </script>
        <?php
    }