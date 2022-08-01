<?php include("db.php") ?>
<?php include("includes/header.php")?>


<div class="container p-4">
<div class="row">
    <div class="col-md-4">

        <?php 
          
        if(isset($_SESSION['mensaje'])){?>
            <div class="alert alert-<?=$_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();}?>

        <div class="card card-body">
            <form action="guardar.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nombrerestaurante" class="form-control" placeholder="Nombre" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="correo" class="form-control" placeholder="Correo" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="contraseña" class="form-control" placeholder="contraseña" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="descripcion" id="" rows="2" class="form-control" placeholder="Descripción"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">
            </form> 
            </div>
        </div>
        <div class='col-md-8'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM restaurante";
                    $result_restaurante= mysqli_query($con,$query);

                    while($row= mysqli_fetch_array($result_restaurante)){?>
                    <tr>
                        <td><?php echo $row['nombrerestaurante']?></td>
                        <td><?php echo $row['correo']?></td>
                        <td><?php echo $row['descripcion']?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['idrestaurante']?>" class="btn btn-secondary "><i class='fas fa-marker'></i></a>
                            <a href="delete.php?id=<?php echo $row['idrestaurante']?>" class="btn btn-danger"><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>