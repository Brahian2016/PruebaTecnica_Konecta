<?php   

include("../model/conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM productos WHERE ID = '$id'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);

include ("../template/header.php");
?>


<body>
    <div class="container mt-3">

        <h5>
            <center>Actualizar Producto</center>
        </h5>

        <form action="../controller/update.php" method="POST">

            <input type="text" class="form-control mb-3" name="ID" value="<?php  echo $row['ID'] ?>" readonly>
            <input type="text" class="form-control mb-3" name="NombreProducto" value="<?php  echo $row['NombreProducto'] ?>">
            <input type="text" class="form-control mb-3" name="Referencia" value="<?php  echo $row['Referencia'] ?>">
            <input type="text" class="form-control mb-3" name="Precio" value="<?php  echo $row['Precio'] ?>">
            <input type="text" class="form-control mb-3" name="Peso" value="<?php  echo $row['Peso'] ?>">
            <input type="text" class="form-control mb-3" name="Categoria" value="<?php  echo $row['Categoria'] ?>">
            <input type="text" class="form-control mb-3" name="Stock" value="<?php  echo $row['Stock'] ?>">
            <input type="text" class="form-control mb-3" name="FechaCreacion" value="<?php  echo $row['FechaCreacion'] ?>" readonly>

            <input type="submit" class="btn btn-outline-primary btn-lg">
            <a href="principal.php" class="btn btn-outline-warning btn-lg">Cancelar</a>

        </form>

    </div>

<?php
include ("../template/footer.php");
?>