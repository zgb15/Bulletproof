<?php if(isset($_SESSION['nombre']) && isset($_SESSION['tipo'])){
        
        // if(isset($_POST['fecha_ticket']) && isset($_POST['name_ticket']) && isset($_POST['email_ticket'])){
        if(isset($_POST['clave_fichaje']) && isset($_POST['tipo'])){

          $clave_fichaje=  MysqlQuery::RequestPost('clave_fichaje');
          $tipo=  MysqlQuery::RequestPost('tipo');

          if(MysqlQuery::Guardar("fichaje","claveFichaje,fecha_hora,tipo", "'$clave_fichaje',CURRENT_TIME(),'$tipo'")){
            
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">HAS FICHADO</h4>
                    <p class="text-center">
                        Has fichado correctamente.</strong>
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">HUBO UN ERROR</h4>
                    <p class="text-center">
                        No se ha registrado la asistencia. Por favor vuelva a intentarlo.
                    </p>
                </div>
            ';
          }
        }
?>
        <div class="container">
          <div class="row well">
            <div class="col-sm-12 lead">
              <h2 class="text-info">¿Cómo fichar mi jornada?</h2>
              <p>Para fichar su jornada debe ingresar su <strong>clave de fichaje </strong> y el tipo de fichaje. </p>
            </div>
          </div><!--fin row 1-->

          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title text-center"><strong><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;Ticket</strong></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-4 text-center">
                      <br>
                      <img src="img/fichaje.png" alt=""><br><br>
                      <p class="text-primary text-justify">Por favor complete los datos de este formulario</p>
                    </div>
                    <div class="col-sm-8">
                      <form class="form-horizontal" role="form" action="" method="POST">
                          <fieldset>

                          <div class="form-group">
                          <label  class="col-sm-2 control-label">Clave</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Clave de Fichaje" name="clave_fichaje" required="">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Tipo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <select class="form-control" name="tipo">
                                  <option value="Entrada">Entrada</option>
                                  <option value="Salida">Salida</option>
                                  <option value="Inicio Hora Comida">Inicio Hora Comida</option>
                                  <option value="Final Hora Comida">Final Hora Comida</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Fichar</button>
                          </div>
                        </div>
                             </fieldset> 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <br><br><br><br>
<?php
}else{
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="./img/Stop.png" alt="Image" class="img-responsive"/><br><br><br>
            </div>
            <div class="col-sm-7 text-center">
                <h1 class="text-default">No tiene los permisos necesarios</h1>
                <h3 class="text-info">Inicie sesión para poder acceder</h3>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
  $(document).ready(function(){
      $("#fechainput").datepicker();
  });
</script>