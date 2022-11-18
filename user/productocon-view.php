<?php
if(isset($_POST['del_producto'])){
  $id=MysqlQuery::RequestPost('del_producto');

  if(MysqlQuery::Eliminar("producto", "id='$id'")){
    echo '
        <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="text-center">PRODUCTO ELIMINADO</h4>
            <p class="text-center">
                El producto se ha eliminado correctamente
            </p>
        </div>
    ';
  }else{
    echo '
        <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="text-center">HUBO UN ERROR</h4>
            <p class="text-center">
                No se ha podido eliminar el producto
            </p>
        </div>
    ';
  }
}

$id_colsul= MysqlQuery::RequestGet('id_consul');

$consulta_tablaProducto=Mysql::consulta("SELECT * FROM producto WHERE descripcion= '$id_colsul'");
if(mysqli_num_rows($consulta_tablaProducto)>=1){
  $lsT=mysqli_fetch_array($consulta_tablaProducto, MYSQLI_ASSOC);   
?>
        <div class="container">
            <div class="row well">
            <div class="col-sm-12 lead text-justify">
              <h2 class="text-info">Producto</h2>
              <p>Si su <strong>producto</strong> no tiene el stock correcto, consúltelo con soporte por favor.</p>
            </div>
          </div><!--fin row well-->
          <div class="row">
              <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center"><h4><i class="fa fa-ticket"></i> Producto: &nbsp;#<?php echo $lsT['id']; ?></h4></div>
                        <br>
                      <div class="panel-body">
                          <div class="container">
                              <div class="col-sm-12">
                                  <div class="row">

                                    <?php
                                        if($lsT['tipo']=='Hardware'){
                                            echo '<div class="col-sm-4">
                                            <img class="img-responsive" alt="Image" src="img/hardware.png">
                                        </div><br><br>';
                                        }else if($lsT['tipo']=='Material Oficina'){
                                            echo '<div class="col-sm-4">
                                            <img class="img-responsive" alt="Image" src="img/material.png">
                                        </div><br><br>';
                                        }
                                    ?>

                                      <div class="col-sm-8">
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Descripción:</strong> <?php echo $lsT['descripcion']; ?></div>
                                              <div class="col-sm-6"><strong>Tipo:</strong> <?php echo $lsT['tipo']; ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Stock:</strong> <?php echo $lsT['stock']; ?></div>
                                              <div class="col-sm-6"><strong>Disponible:</strong> <?php echo $lsT['disponible']; ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Reservado:</strong> <?php echo $lsT['reservado']; ?></div>
                                              <div class="col-sm-6"><strong>Ubicación:</strong> <?php echo $lsT['ubicacion']; ?></div>
                                          </div>
                                          <br>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
              </div>
          </div>
        </div>
        <br>
 <?php }else{ ?>
        <div class="container">
            <div class="row  animated fadeInDownBig">
                <div class="col-sm-4">
                    <img src="img/error.png" alt="Image" class="img-responsive"/><br>                    
                </div>
                <div class="col-sm-7 text-center">
                    <h2 class="text-primary">Error al hacer la consulta debido a que:</h2>
                    <h4 class="text-muted"><i class="fa fa-check"></i> El producto ha sido eliminado completamente.</h4>
                    <h4 class="text-muted"><i class="fa fa-check"></i> Los datos ingresados no son correctos.</h4>
                    <br>
                    <h4 class="text-info"> Por favor verifique que su <strong>descripción</strong> es correcta, e intente nuevamente.</h4>
                    <h4><a href="./index.php?view=stock" class="btn btn-primary"><i class="fa fa-reply"></i> Volver </a></h4>
                    <br>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php } ?>
<script>
  $(document).ready(function(){
    $("button#save").click(function (){
       window.open ("./lib/pdf_user.php?id="+$(this).attr("data-id"));
    });
  });
</script>