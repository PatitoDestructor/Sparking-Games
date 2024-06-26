<?php

require_once('../conexion.php');

$nombrecompleto = $_POST['nombrecompleto'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
strtolower($perfil = $_POST['perfil']);
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$query = "INSERT INTO usuarios (nombrecompleto, usuario, correo, contrasena, foto, perfil) VALUES ('$nombrecompleto', '$usuario', '$correo', '$contrasena', '$foto', '$perfil')";
$resultado = $conexion->query($query);

if($resultado){
    echo "<script>alert(\"Se ha creado el usuario exitosamente.\");
    window.location.href = \"../../administracion.php\";</script>";
}else{
    echo "<script>alert(\"Error al agregar el usuario.\");
    window.location.href = \"../../administracion.php\";
    </script>";
}

?>