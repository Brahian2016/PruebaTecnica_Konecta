  <?php 

include ("../model/conexion.php");
$con=conectar();

$sql="SELECT * FROM Productos";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);


include ("../template/header.php");
?>
  <div class="container mt-5">

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
}} 
if (isset($_GET['venta'])) {
if($_GET['venta'] == 'true'){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Felicidades!</strong>, La venta se registro correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
}else if($_GET['venta'] == 'false'){

  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>¡Error!</strong>, No puedes vender más productos de los que no tienes
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
}}
?>



    <h3>
      <center>Registrar Venta</center>
    </h3>

    <form action="../controller/insertarVenta.php" method="POST">

      <div class="form-group">

        <select class="form-select form-select-lg mb-3" name="IDProducto">
          <option selected value="-1">Selecciona el producto...</option>
          <?php
                        while($row=mysqli_fetch_array($query)){
                  ?>
          <option value="<?php echo $row['ID'] ?>"><?php echo $row['NombreProducto'] ?></option>
          <?php
                        }
                  ?>
        </select>

      </div>
      <br>
      <input type="text" class="form-control mb-3" name="CantidadVendida" placeholder="Digita la cantidad de venta">

      <input type="submit" class="btn btn-primary">

    </form>

  </div>



<?php
include ("../template/footer.php");
?>