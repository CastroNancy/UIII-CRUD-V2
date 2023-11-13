<?php

include('db.php');

if (isset($_POST['save_productos'])) {
  $caducidad = $_POST['caducidad'];
  $precio = $_POST['precio'];
  $tamano = $_POST['tamano'];
  $promocion = $_POST['promocion'];
  $distribuidora = $_POST['distribuidora'];
  $idSucursal = $_POST['idSucursal'];
  $nombreproducto = $_POST['nombreproducto'];
  $query = "INSERT INTO productos(caducidad, precio, tamano, promocion, distribuidora, idSucursal, nombreproducto) VALUES ('$caducidad', '$precio', '$tamano', '$promocion', '$distribuidora', '$idSucursal', '$nombreproducto')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'productos guardados con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
