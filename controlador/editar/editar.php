<?php

require_once('../conexion.php');

session_start();

if($_POST){

    $idusuario = $_SESSION['idusuario'];

    $nuevonombre = $_POST['Nuevonombre'];
    $nuevousuario= $_POST['Nuevousuario'];
    $nuevocontraseña = $_POST['Nuevocontrasena'];
    $nuevofoto = addslashes(file_get_contents($_FILES['Nuevofoto']['tmp_name']));

    $update = "UPDATE usuarios SET 
    nombrecompleto = '$nuevonombre',
    usuario = '$nuevousuario', 
    contrasena = '$nuevocontraseña',
    foto = '$nuevofoto'
    WHERE idusuario = $idusuario";

    mysqli_query($conexion, $update);

    if($update){
        echo "<script>alert(\"Se han actualizado los datos.\");
        window.location.href = \"../../inicio.php\";
        </script>";
    }else{
        echo "<script>alert(\"Hubo un error al actualizar.\");
        window.location.href = \"../../inicio.php\";
        </script>";
    }


}else{

    echo "<script>alert(\"Por favor llenar todos los campos.\");
    window.location.href = \"../../inicio.php\";
    </script>";

}

?>