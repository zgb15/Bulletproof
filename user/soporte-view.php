<div class="container">
  <div class="row well">
    <div class="col-sm-3">
      <img src="img/tux_repair.png" class="img-responsive" alt="Image">
    </div>
    <div class="col-sm-9 lead">
      <h2 class="text-info">Bienvenido al centro de soporte de IT - Bulletproof </h2>
      <p>Uso sencillo y rápido, si tiene una incidencia solo necesita crear un ticket. <br> Si quiere consultar un ticket ya creado, puede visualizarlo introduciendo el <strong>Ticket ID</strong>.</p>
      <p>Cualquier duda respecto al uso de esta herramienta puede contactar a <strong> soporte@bulletproofprod.com </strong></p>
    </div>
  </div><!--fin row 1-->

  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading text-center"><i class="	fa fa-plus-square-o"></i>&nbsp;<strong>Nuevo Ticket</strong></div>
        <div class="panel-body text-center">
          <img src="./img/new_ticket.png" alt="">
          <h4>Crear ticket nuevo</h4>
          <p class="text-justify"> Si tienes una petición, incidencia o problema, abre un nuevo ticket y te responderemos en la mayor brevedad posible. Si quieres ver un ticket anterior, ve a la derecha a <em>Comprobar estado de Ticket</em>. *PD: Solo los <strong>usuarios registrados</strong> pueden hacer uso de los tickets.</p>
          <p>Para abrir un nuevo <strong>ticket</strong> pincha en el botón </p>
          <a type="button" class="btn btn-info" href="./index.php?view=ticket">Nuevo Ticket</a>
        </div>
      </div>
    </div><!--fin col-md-6-->
    
    <div class="col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><i class="fa fa-spinner"></i>&nbsp;<strong>Consultar Ticket</strong></div>
        <div class="panel-body text-center">
          <img src="./img/old_ticket.png" alt="">
          <h4>Ver información de un ticket</h4>
          <form class="form-horizontal" role="form" method="GET" action="./index.php">
            <input type="hidden" name="view" value="ticketcon">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email_consul" placeholder="Email" required="">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">Ticket ID</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_consul" placeholder="ID Ticket" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Consultar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!--fin col-md-6-->
  </div><!--fin row 2-->
</div><!--fin container-->