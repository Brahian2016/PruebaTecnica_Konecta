<?php
include("../model/conexion.php");
$con = conectar();

//Mostrar los productos con mayor cantidad en stock
$sql1 = "SELECT * FROM productos WHERE Stock  =  (SELECT max(Stock) FROM productos)";

//Mostrar producto más vendido
$sql2 = 'SELECT IDProducto, SUM(CantidadVendida) as VENDIDO ,p.NombreProducto as Nombre FROM   ventas v INNER JOIN productos p ON v.IDProducto = p.ID GROUP  BY IDProducto ORDER  BY VENDIDO DESC LIMIT 1';
$query1 = mysqli_query($con,$sql1);
$query2 = mysqli_query($con,$sql2);

include ("../template/header.php");
?>

<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                <div class="card-header">
                <center><h5>Productos con mayor cantidad en Stock</h5></center>

                
</div>


                </div>
              

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            while($row=mysqli_fetch_array($query1)){
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
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>


            </div>
            <div class="col-md-3">

            <div class="card">
                <div class="card-header">
                <center><h5>Producto más Vendido</h5> </center>

                
</div>


                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="table-dark">ID</th>
                            <th scope="col" class="table-dark">Cantidad Vendida</th>
                            <th scope="col" class="table-dark">Nombre Producto</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            while($row=mysqli_fetch_array($query2)){
                        ?>
                        <tr>
                            <td><?php  echo $row['IDProducto'] ?></td>
                            <td><?php  echo $row['VENDIDO'] ?></td>
                            <td><?php  echo $row['Nombre'] ?></td>
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