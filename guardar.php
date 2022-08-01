<?php 
include("db.php");

if(isset($_POST['guardar'])){
    $nombrerestaurante = $_POST['nombrerestaurante'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $descripcion = $_POST['descripcion'];

    $query="INSERT INTO restaurante(nombrerestaurante, correo, contraseña,descripcion) VALUES ('{$nombrerestaurante}','{$correo}','{$contraseña}','{$descripcion}')";
    $result = mysqli_query($con , $query);

    if(!$result){
        die("Query failed");
    }

    $_SESSION['mensaje'] = 'Restaurante guardado con éxito';
 
    $_SESSION['tipo_mensaje'] = 'success';

    header("location: index.php");
}
?>