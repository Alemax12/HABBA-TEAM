<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];

$sql = "UPDATE usuario SET id_rol=NULL WHERE id_rol=$id";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$sql = "DELETE FROM rol WHERE id_rol=$id";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
