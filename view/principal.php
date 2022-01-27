<?php   

include ("../model/conexion.php");
$con=conectar();

$sql="SELECT * FROM Productos";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);

//$sql1="SELECT top(1) ID FROM Productos order by desc";
//$query1 = mysqli_query($con,$sql1);
//$row1 = mysqli_fetch_array($query1);


include ("../template/header.php");
?>
<div class="container mt-5">
    <div class="row">

        <?php
if(isset($_GET['validar'])){
if($_GET['validar'] == 'false'){

?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Error!</strong>, Por favor completa todos los campos.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <?php
}else if($_GET['validar'] == 'true'){
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Felicidades!</strong>, El producto se registro correctamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
}

}
?>

        <div class="col-md-3">
            <h3>
                <center>Registrar Productos</center>
            </h3>

            <form action="../controller/insertar.php" method="POST">

                <!--<input type="text" class="form-control mb-3" name="ID" placeholder="<?php   
                            //$rs = mysqli_query($con, "SELECT MAX(ID) AS id FROM productos");
                            //if ($row = mysqli_fetch_row($rs)) {
                            //$id = trim($row[0]);
                            //echo $id+1;
                            //}
                        ?>" readonly>-->
                <input type="text" class="form-control mb-3" name="NombreProducto" placeholder="Nombre del Produto">
                <input type="text" class="form-control mb-3" name="Referencia" placeholder="Referencia">
                <input type="text" class="form-control mb-3" name="Precio" placeholder="Precio">
                <input type="text" class="form-control mb-3" name="Peso" placeholder="Peso">
                <input type="text" class="form-control mb-3" name="Categoria" placeholder="Categoría">
                <input type="text" class="form-control mb-3" name="Stock" placeholder="Stock">
                <input type="text" class="form-control mb-3" name="FechaCreacion"
                    placeholder="<?php echo date('Y-m-d H:i:s');?>" readonly>

                <input type="submit" class="btn btn-primary">

            </form>

        </div>
        <div class="col-md-8">
            <h3>
                <center>Mostrar Productos</center>
            </h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="table-dark">ID</th>
                        <th scope="col" class="table-dark">Nombre Producto</th>
                        <th scope="col" class="table-dark">Referencia</th>
                        <th scope="col" class="table-dark">Precio</th>
                        <th scope="col" class="table-dark">Peso</th>
                        <th scope="col" class="table-dark">Categoria</th>
                        <th scope="col" class="table-dark">Stock</th>
                        <th scope="col" class="table-dark">FechaCreacion</th>
                        <th scope="col" class="table-dark"></th>
                        <th scope="col" class="table-dark"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                            while($row=mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <td><?php  echo $row['ID'] ?></td>
                        <td><?php  echo $row['NombreProducto'] ?></td>
                        <td><?php  echo $row['Referencia'] ?></td>
                        <td><?php  echo $row['Precio'] ?></td>
                        <td><?php  echo $row['Peso'] ?></td>
                        <td><?php  echo $row['Categoria'] ?></td>
                        <td><?php  echo $row['Stock'] ?></td>
                        <td><?php  echo $row['FechaCreacion'] ?></td>
                        <td><a href="actualizar.php?id=<?php  echo $row['ID'] ?>"
                                class="btn btn-outline-primary">Editar</a></td>
                        <td><a href="../controller/borrar.php?id=<?php  echo $row['ID'] ?>"
                                class="btn btn-outline-danger">Eliminar</a></td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>


        </div>

    </div>


</div>



<?php
include ("../template/footer.php");
?>