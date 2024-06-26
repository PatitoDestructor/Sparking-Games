<?php

require_once('../conexion.php');

session_start();

if($_POST){

$usuario = $_POST['usuario'];
$contraseña = $_POST['contrasena'];

$sql = "SELECT idusuario, nombrecompleto, usuario, correo, contrasena, foto, perfil FROM usuarios WHERE usuario = '$usuario'";

$resultado = $conexion->query($sql);
$num = $resultado->num_rows;

if($num > 0){ 

    $row = $resultado->fetch_assoc();
    $password_bd = $row['contrasena'];

    $pass_c = $contraseña;

    if($password_bd == $pass_c){

        $_SESSION['idusuario'] = $row['idusuario'];
        $_SESSION['nombrecompleto'] = $row['nombrecompleto'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['perfil'] = $row['perfil'];
        $_SESSION['foto'] = $row['foto'];

        header('Location: ../../inicio.php');

    }else{

        echo "<script>alert(\"La contraseña no coincide.\");
        window.location.href = \"../../inicia sesion.php\";
        </script>";

    }

}else{

    echo "<script>alert(\"No existe el usuario.\");
    window.location.href = \"../../inicia sesion.php\";
    </script>";

}

}


?>

