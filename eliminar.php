<?php
  session_start(); 
  include './lib/class_mysql.php';
  include './lib/config.php';
  header('Content-Type: text/html; charset=UTF-8');
  session_unset();
  session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar</title>
        <?php include "./inc/links.php"; ?>       
    </head>
    <body>
      <?php include "./inc/navbar.php"; ?>
        <div class="container">
          <br><br><br>
          <div class="row">
            <div class="col-md-12 text-center">
              <img src="img/delete.png" alt="">
              <br>
              <h2 class="text-primary">Su cuenta ha sido eliminada correctamente</h2>
              <h4 class="text-info">Todos los datos asociados a tu cuenta han sido eliminados.</h4>
              <br><br>
            </div>
          </div>
          <br><br>
        </div>
      <?php include './inc/footer.php'; ?>
    </body>
</html>