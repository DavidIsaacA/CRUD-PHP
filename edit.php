<?php 
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];


    $query="SELECT * FROM restaurante WHERE idrestaurante ='{$id}'";
    $result = mysqli_query($con , $query);

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $nombre=$row['nombrerestaurante'];
        $correo = $row['correo'];
        $contraseña = $row['contraseña'];
        $descripcion = $row['descripcion'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nombre= $_POST['nombrerestaurante'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE restaurante set nombrerestaurante='{$nombrerestaurante}', correo='{$correo}',contraseña='{$contraseña}',descripcion='{$descripcion}' 
    WHERE idrestaurante= '{$id}'";

    mysqli_query($con,$query);

    header("Location: index.php");
}
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                <div class="form-group">
                    <input type="text" name="nombrerestaurante" class="form-control" value="<?php echo $nombre;?>" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="correo" class="form-control" value="<?php echo $correo;?>" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="contraseña" class="form-control" value="<?php echo $contraseña;?>" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="descripcion" id="" rows="2" class="form-control" value=""><?php echo $descripcion;?></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="update" value="Editar">
            </form> 
            </div>
        </div>
    </div>
</div>