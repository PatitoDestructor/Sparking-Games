<?php
session_start();

require_once('../conexion.php');

$comentario = $_POST['comentario'];
$idguia = $_REQUEST['id'];
$idusuario = $_SESSION['idusuario'];

$query = "INSERT INTO comentarios (comentario, idguia, idusuario) VALUES ('$comentario', '$idguia', '$idusuario')";
$resultado = $conexion->query($query);

if($resultado){
    header('location:../../contenidoGuia.php?id='.$idguia.'#comentarios');
}


?>