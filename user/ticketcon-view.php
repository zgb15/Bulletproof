<?php
if(isset($_POST['del_ticket'])){
  $id=MysqlQuery::RequestPost('del_ticket');

  if(MysqlQuery::Eliminar("ticket", "serie='$id'")){
    echo '
        <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="text-center">TICKET ELIMINADO</h4>
            <p class="text-center">
                El ticket fue eliminado con éxito
            </p>
        </div>
    ';
  }else{
    echo '
        <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="text-center">OCURRIÓ UN ERROR</h4>
            <p class="text-center">
                Lo sentimos, no hemos podido eliminar el ticket
            </p>
        </div>
    ';
  }
}
$email_consul=  MysqlQuery::RequestGet('email_consul');
$id_colsul= MysqlQuery::RequestGet('id_consul');

$consulta_tablaTicket=Mysql::consulta("SELECT * FROM ticket WHERE serie= '$id_colsul' AND email_cliente='$email_consul'");
if(mysqli_num_rows($consulta_tablaTicket)>=1){
  $lsT=mysqli_fetch_array($consulta_tablaTicket, MYSQLI_ASSOC);   
?>
        <div class="container">
            <div class="row well">
            <div class="col-sm-12 lead text-justify">
              <h2 class="text-info">Estado de ticket de soporte</h2>
              <p>Si su <strong>ticket</strong> no ha sido solucionado aún, espere pacientemente, estamos trabajando para poder resolver su problema y darle una solución.</p>
            </div>
          </div><!--fin row well-->
          <div class="row">
              <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center"><h4><i class="fa fa-ticket"></i> Ticket &nbsp;#<?php echo $lsT['serie']; ?></h4></div>
                        <br>
                      <div class="panel-body">
                          <div class="container">
                              <div class="col-sm-12">
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <img class="img-responsive" alt="Image" src="img/tux_repair.png">
                                      </div>
                                      <div class="col-sm-8">
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Fecha:</strong> <?php echo $lsT['fecha']; ?></div>
                                              <div class="col-sm-6"><strong>Estado:</strong> <?php echo $lsT['estado_ticket']; ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Nombre:</strong> <?php echo $lsT['nombre_usuario']; ?></div>
                                              <div class="col-sm-6"><strong>Email:</strong> <?php echo $lsT['email_cliente']; ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Tipo:</strong> <?php echo $lsT['departamento']; ?></div>
                                              <div class="col-sm-6"><strong>Asunto:</strong> <?php echo $lsT['asunto']; ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-12"><strong>Problema:</strong> <?php echo $lsT['mensaje']; ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-12"><strong>Solución:</strong> <?php echo $lsT['solucion']; ?></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
              </div>
          </div>
        </div>
 <?php }else{ ?>
        <div class="container">
            <div class="row  animated fadeInDownBig">
                <div class="col-sm-4">
                    <img src="img/error.png" alt="Image" class="img-responsive"/><br>                    
                </div>
                <div class="col-sm-7 text-center">
                    <h2 class="text-primary">Error al hacer la consulta debido a que:</h2>
                    <h4 class="text-muted"><i class="fa fa-check"></i> El Ticket ha sido eliminado completamente.</h4>
                    <h4 class="text-muted"><i class="fa fa-check"></i> Los datos ingresados no son correctos.</h4>
                    <br>
                    <h4 class="text-info"> Por favor verifique que su <strong>id ticket</strong> y <strong>email</strong> sean correctos, e intente nuevamente.</h4>
                    <h4><a href="./index.php?view=soporte" class="btn btn-primary"><i class="fa fa-reply"></i> Regresar a soporte</a></h4>
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