<?php
    if(isset($_POST['nombre_login']) && isset($_POST['contrasena_login'])){
        include "./process/login.php";
    }
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if(isset($_SESSION['tipo']) && isset($_SESSION['nombre'])): ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $_SESSION['nombre']; ?><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- usuarios -->
                        <?php if($_SESSION['tipo']=="user"): ?>
                        <li>
                            <a href="./index.php?view=configuracion"><i class="fa fa-cogs"></i>&nbsp;&nbsp;Configuración</a>
                        </li> 
                        <?php endif; ?>
                        <!-- admins -->
                        <?php if($_SESSION['tipo']=="admin"): ?>
                        <li>
                            <a href="admin.php?view=stockadmin&producto=all"><span class="glyphicon glyphicon-barcode"></span> &nbsp;Administrar Inventario</a>
                        </li>
                        <li>
                            <a href="admin.php?view=ticketadmin"><span class="glyphicon glyphicon-envelope"></span> &nbsp; Administrar Tickets</a>
                        </li>
                        <li>
                            <a href="admin.php?view=users"><span class="glyphicon glyphicon-user"></span> &nbsp;Administrar Usuarios</a>
                        </li>
                        <li>
                            <a href="admin.php?view=admin"><span class="glyphicon glyphicon-user"></span> &nbsp;Administrar Administradores</a>
                        </li>
                        <li>
                            <a href="admin.php?view=fichajes"><span class="glyphicon glyphicon-check"></span> &nbsp;Administrar Fichajes</a>
                        </li>
                        <li>
                            <a href="admin.php?view=config"><i class="fa fa-cogs"></i> &nbsp; Configuración</a>
                        </li>
                        <?php endif; ?> 
                        <li class="divider"></li>
                        <li ><a href="./process/logout.php"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <?php endif; ?>
            <ul class=" nav navbar-nav navbar-center">
            
                <li>
                    <a href="./index.php">&nbsp; <img src="img/My project-1 (8).png" alt="" width="25"> </a>
                </li>
                <li>
                    <a href="./index.php"><span class="glyphicon glyphicon-home"></span> &nbsp; Inicio</a>
                </li>
                <li>
                    <a href="./index.php?view=productos"><span class="glyphicon glyphicon-cloud"></span> &nbsp; Producciones</a>
                </li>
                <li>
                    <a href="./index.php?view=soporte"><span class="glyphicon glyphicon-flag"></span>&nbsp;&nbsp;Soporte técnico</a>
                </li>
                <li>
                    <a href="./index.php?view=stock"><span class="glyphicon glyphicon-tags"></span> &nbsp; Productos</a>
                </li>
                <li>
                    <a href="./index.php?view=fichaje"><span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;Fichar</a>
                </li>
                <li>
                    <a href="./index.php?view=calendario"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Calendario</a>
                </li>
                <!--
                <li>
                    <a href="./index.php?view=documentos"><span class="glyphicon glyphicon-download-alt"></span> &nbsp; Documentos</a>
                </li>
                -->

                <?php if(!isset($_SESSION['tipo']) && !isset($_SESSION['nombre'])): ?>
                    <li>
                        <a href="./index.php?view=registro"><i class="fa fa-users"></i>&nbsp;&nbsp;Registro</a>
                    </li>
                    <li>
                        <a href="#!" data-toggle="modal" data-target="#modalLog"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Login</a>
                    </li>
                <?php endif; ?>

            </ul>
            <form class="navbar-form navbar-right hidden-xs" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar">
                </div>
                <button type="button" class="btn btn-info">Buscar</button>
            </form>
        </div>
    </div>
</nav>

<div class="modal fade" tabindex="-1" role="dialog" id="modalLog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title text-center text-primary" id="myModalLabel">Bienvenido a Bulletproof Production</h4>
            </div>
          <form action="" method="POST" style="margin: 20px;">
              <div class="form-group">
                  <label><span class="glyphicon glyphicon-user"></span>&nbsp;Nombre de Usuario</label>
                  <input type="text" class="form-control" name="nombre_login" placeholder="Escribe tu nombre de usuario" required=""/>
              </div>
              <div class="form-group">
                  <label><span class="glyphicon glyphicon-lock"></span>&nbsp;Contraseña</label>
                  <input type="password" class="form-control" name="contrasena_login" placeholder="Escribe tu contraseña" required=""/>
              </div>
              
              <p>Elige un tipo de usuario</p>
              <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" value="user" checked>
                    Usuario
                </label>
             </div>
             <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" value="admin">
                     Administrador
                </label>
             </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Iniciar sesión</button>
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
              </div>
          </form>
      </div>
    </div>
</div>