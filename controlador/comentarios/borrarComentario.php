<?php

//Validacion Borrar

if(empty($_REQUEST['id'])){
    header("Location:../../Biblioteca.php");
}else{
    require_once('../conexion.php');

    $idcomentario = $_REQUEST['id'];
    $idguia = $_REQUEST['idguia'];

    $query_delete = mysqli_query($conexion, "DELETE FROM comentarios WHERE idcomentario = $idcomentario");

    if($query_delete){
        header('location: ../../contenidoGuia.php?id='.$idguia.'#comentarios');
    }else{
        echo "<script>alert(\"Error al eliminar el comentario.\");
        window.location.href = \"../../Biblioteca.php\";
        </script>";
    }
}

?>