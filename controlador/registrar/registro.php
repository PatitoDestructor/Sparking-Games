<?php

require_once('../conexion.php');

$nombrecompleto = $_POST['nombrecompleto'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$query = "INSERT INTO usuarios (nombrecompleto, usuario, correo, contrasena, foto, perfil) VALUES ('$nombrecompleto', '$usuario', '$correo', '$contrasena', '$foto', 'usuario')";
$resultado = $conexion->query($query);

if($resultado){
    echo "<script>alert(\"Te has registrado exitosamente.\");
    window.location.href = \"../../inicio.php\";</script>";
}else{
    echo "<script>alert(\"Error al registrarte.\");
    window.location.href = \"../../registrate.php\";
    </script>";
}

?>

