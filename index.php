<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD productos FORM -->
      <div class="card card-body">
        <form action="save_productos.php" method="POST">
<h1>tabla productos</h1>
          <div class="form-group">
            <p>Caducidad del producto</p>
            <input type="date" name="caducidad" class="form-control"  autofocus>
          </div>

          <div class="form-group">
          <p>Precio del producto</p>
          <input type="text" name="precio" class="form-control" placeholder="00.00" autofocus>
          </div>

          <div class="form-group">
          <p>tamano del producto</p>
          <input type="text" name="tamano" class="form-control" placeholder="000gr/0lt" autofocus>
          </div>

          <div class="form-group">
          <p>promocion del producto</p>
          <input type="text" name="promocion" class="form-control" placeholder="000%" autofocus>
          </div>

          <div class="form-group">
          <p>distribuidora del producto</p>
          <input type="text" name="distribuidora" class="form-control" placeholder="" autofocus>
          </div>

          <div class="form-group">
          <p>idSucursal del producto</p>
          <input type="text" name="idSucursal" class="form-control" placeholder="0" autofocus>
          </div>

          <div class="form-group">
          <p>nombreproducto del producto</p>
          <input type="text" name="nombreproducto" class="form-control" placeholder="" autofocus>
          </div>
          
          <input type="submit" name="save_productos" class="btn btn-success btn-block" value="Save productos">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>caducidad</th>
            <th>precio</th>
            <th>tamaño</th>
            <th>promocion</th>
            <th>distribuidora</th>
            <th>idSucursal</th>
            <th>nombreproducto</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM productos";
          $result_productoss = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_productoss)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['caducidad']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['tamano']; ?></td>
            <td><?php echo $row['promocion']; ?></td>
            <td><?php echo $row['distribuidora']; ?></td>
            <td><?php echo $row['idSucursal']; ?></td>
            <td><?php echo $row['nombreproducto']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_productos.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
