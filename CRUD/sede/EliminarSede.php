<?php
include_once('../database.php');
$id = $_POST["id"];

$sql = "DELETE FROM sede WHERE id_sede=$id";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
