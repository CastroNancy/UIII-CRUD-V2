<?php
include("db.php");
$caducidad = '';
$precio= '';
$tamano= '';
$promocion= '';
$distribuidora= '';
$idSucursal= '';
$nombreproducto= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM productos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $caducidad = $row['caducidad'];
    $precio = $row['precio'];
    $tamano = $row['tamano'];
    $promocion = $row['promocion'];
    $distribuidora = $row['distribuidora'];
    $idSucursal = $row['idSucursal'];
    $nombreproducto = $row['nombreproducto'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $caducidad= $_POST['caducidad'];
  $precio = $_POST['precio'];
  $tamano = $_POST['tamano'];
  $promocion = $_POST['promocion'];
  $distribuidora = $_POST['distribuidora'];
  $idSucursal = $_POST['idSucursal'];
  $nombreproducto = $_POST['nombreproducto'];

  $query = "UPDATE productos set caducidad = '$caducidad', precio = '$precio', tamano = '$tamano', promocion = '$promocion', distribuidora = '$distribuidora', idSucursal = '$idSucursal', nombreproducto = '$nombreproducto' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'productos editado con exxito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        
      <div class="form-group">
          <input name="caducidad" type="text" class="form-control" value="<?php echo $caducidad; ?>" placeholder="Update caducidad">
        </div>

        <div class="form-group">
        <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Update precio">
        </div>

        <div class="form-group">
        <input name="tamano" type="text" class="form-control" value="<?php echo $tamano; ?>" placeholder="Update tamano">
        </div>

        <div class="form-group">
        <input name="promocion" type="text" class="form-control" value="<?php echo $promocion; ?>" placeholder="Update promocion">
        </div>

        <div class="form-group">
        <input name="distribuidora" type="text" class="form-control" value="<?php echo $distribuidora; ?>" placeholder="Update distribuidora">
        </div>

        <div class="form-group">
        <input name="idSucursal" type="text" class="form-control" value="<?php echo $idSucursal; ?>" placeholder="Update idSucursal">
        </div>

        <div class="form-group">
        <input name="nombreproducto" type="text" class="form-control" value="<?php echo $nombreproducto; ?>" placeholder="Update nombreproducto">
        </div>

        <div class="form-group">
        <input name="nombreproducto" type="text" class="form-control" value="<?php echo $nombreproducto; ?>" placeholder="Update nombreproducto">
        </div>

        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
