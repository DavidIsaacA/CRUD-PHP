<?php 
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM restaurante WHERE idrestaurante='{$id}'";
    $result = mysqli_query($con, $query);

    if(!$result){
        die('Query failed');
    }

    $_SESSION['mensaje'] = 'Restaurante Eliminado con éxito';
 
    $_SESSION['tipo_mensaje'] = 'danger';

    header("location: index.php");
}
?>