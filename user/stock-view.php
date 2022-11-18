<div class="container">
  <div class="row well">
    <div class="col-sm-3">
      <img src="img/product.png" class="img-responsive" alt="Image">
    </div>
    <div class="col-sm-9 lead">
      <h2 class="text-info">Bienvenido al centro de productos de Bulletproof </h2>
      <p>Puedes dar de alta un nuevo producto siempre que estés registrado. <br> Si quiere buscar un producto ya existente, puede introducir su <strong>ID</strong>.</p>
      <p>Todos los productos dados de alta por los usuarios se crearán con Stock igual a 0, para dar de alta stock o reservar material abra un ticket o contacte a <strong> soporte@bulletproofprod.com </strong></p>
    </div>
  </div><!--fin row 1-->

  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading text-center"><i class="	fa fa-plus-square-o"></i>&nbsp;<strong>Nuevo Producto</strong></div>
        <div class="panel-body text-center">
          <h4>Crear producto nuevo</h4>
          <br>
          <p class="text-center"> Solo los <strong>usuarios registrados</strong> pueden crear productos.</p>
          <p>Para crear un nuevo <strong>producto</strong> pincha en el botón </p>
          <br>
          <a type="button" class="btn btn-info" href="./index.php?view=nuevoProducto">Nuevo Producto</a>
          <br>
        </div>
      </div>
    </div><!--fin col-md-6-->
    
    <div class="col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><i class="fa fa-spinner"></i>&nbsp;<strong>Consultar Producto</strong></div>
        <div class="panel-body text-center">
          <h4>Ver información de un producto</h4>
          <form class="form-horizontal" role="form" method="GET" action="./index.php">
            <input type="hidden" name="view" value="productocon">
            <br>
            <div class="form-group">
              <label  class="col-sm-2 control-label">Descripción:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_consul" placeholder="Desc. Producto" required="">
              </div>
            </div>
            <br>
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary">Consultar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!--fin col-md-6-->
  </div><!--fin row 2-->
</div><!--fin container-->