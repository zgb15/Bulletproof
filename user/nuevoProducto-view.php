<?php if(isset($_SESSION['nombre']) && isset($_SESSION['tipo'])){
        
        // if(isset($_POST['fecha_ticket']) && isset($_POST['name_ticket']) && isset($_POST['email_ticket'])){
        if(isset($_POST['descripcion_producto']) && isset($_POST['tipo_producto']) && isset($_POST['ubicacion_producto'])){

          $descripcion_producto=  MysqlQuery::RequestPost('descripcion_producto');
          $tipo_producto=  MysqlQuery::RequestPost('tipo_producto');
          $ubicacion_producto= MysqlQuery::RequestPost('ubicacion_producto');

          if(MysqlQuery::Guardar("producto","descripcion,tipo,stock,disponible,reservado,ubicacion", "'$descripcion_producto','$tipo_producto',0,0,0,'$ubicacion_producto'")){
            
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">PRODUCTO CREADO</h4>
                    <p class="text-center">
                        Producto creado correctamente.</strong>
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">HUBO UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido crear el producto. Por favor vuelva a intentarlo.
                    </p>
                </div>
            ';
          }
        }
?>
        <div class="container">
          <div class="row well">
            <div class="col-sm-12 lead">
              <h2 class="text-info">¿Cómo crear un nuevo producto?</h2>
              <p>Para crear un nuevo producto deberá de completar los campos de el siguiente formulario. Podrá consultar el producto con el <strong>ID</strong> que se le generará.</p>
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
                      <img src="img/write_email.png" alt=""><br><br>
                      <p class="text-primary text-justify">Por favor complete los datos de este formulario</p>
                    </div>
                    <div class="col-sm-8">
                      <form class="form-horizontal" role="form" action="" method="POST">
                          <fieldset>

                          <div class="form-group">
                          <label  class="col-sm-2 control-label">Descripcion</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Descripción" name="descripcion_producto" required="">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Tipo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <select class="form-control" name="tipo_producto">
                                  <option value="Hardware">Hardware</option>
                                  <option value="Material Oficina">Material Oficina</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Ubicacion</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <select class="form-control" name="ubicacion_producto">
                                  <option value="Madrid">Madrid</option>
                                  <option value="Barcelona">Barcelona</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>

                        <!--
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Foto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="file" class="form-control" placeholder="Imagen" name="producto_foto" required="" accept=".jpg, .png, .jpeg">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>
                        -->
                        
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Crear producto</button>
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