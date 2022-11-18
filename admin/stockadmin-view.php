<?php if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ ?>
        <div class="container">
          <div class="row">
            <div class="col-sm-2">
              <img src="./img/stock.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-10">
              <p class="lead text-info">Bienvenido administrador, aquí puede ver el inventario.</p>
            </div>
          </div>
        </div>
            <?php
                if(isset($_POST['id_del'])){
                    $id = MysqlQuery::RequestPost('id_del');
                    if(MysqlQuery::Eliminar("producto", "id='$id'")){
                        echo '
                            <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="text-center">PRODUCTO ELIMINADO</h4>
                                <p class="text-center">
                                    Producto eliminado correctamente
                                </p>
                            </div>
                        ';
                    }else{
                        echo '
                            <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="text-center">HUBO UN ERROR</h4>
                                <p class="text-center">
                                    No hemos podido eliminar el producto
                                </p>
                            </div>
                        '; 
                    }
                }

                /* Todos los productos*/
                $num_ticket_all=Mysql::consulta("SELECT * FROM producto");
                $num_total_all=mysqli_num_rows($num_ticket_all);

                /* Productos sin stock*/
                $num_ticket_pend=Mysql::consulta("SELECT * FROM producto WHERE stock=0");
                $num_total_pend=mysqli_num_rows($num_ticket_pend);

                /* Productos de tipo Material Oficina*/
                $num_ticket_proceso=Mysql::consulta("SELECT * FROM producto WHERE tipo='Material Oficina'");
                $num_total_proceso=mysqli_num_rows($num_ticket_proceso);

                /*Productos de tipo Hardware*/
                $num_ticket_res=Mysql::consulta("SELECT * FROM producto WHERE tipo='Hardware'");
                $num_total_res=mysqli_num_rows($num_ticket_res);
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="./admin.php?view=stockadmin&producto=all"><i class="fa fa-list"></i>&nbsp;&nbsp;Todos los productos&nbsp;&nbsp;<span class="badge"><?php echo $num_total_all; ?></span></a></li>
                            <li><a href="./admin.php?view=stockadmin&producto=pending"><i class="fas fa-ban"></i>&nbsp;&nbsp;Productos sin stock&nbsp;&nbsp;<span class="badge"><?php echo $num_total_pend; ?></span></a></li>
                            <li><a href="./admin.php?view=stockadmin&producto=process"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Material de oficina&nbsp;&nbsp;<span class="badge"><?php echo $num_total_proceso; ?></span></a></li>
                            <li><a href="./admin.php?view=stockadmin&producto=resolved"><i class="fas fa-cogs"></i>&nbsp;&nbsp;Hardware&nbsp;&nbsp;<span class="badge"><?php echo $num_total_res; ?></span></a></li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php
                                $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                                mysqli_set_charset($mysqli, "utf8");

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 15;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

                                
                                if(isset($_GET['producto'])){
                                    if($_GET['producto']=="all"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM producto LIMIT $inicio, $regpagina";
                                    }elseif($_GET['producto']=="pending"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE stock=0 LIMIT $inicio, $regpagina";
                                    }elseif($_GET['producto']=="process"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE tipo='Material Oficina' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['producto']=="resolved"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE tipo='Hardware' LIMIT $inicio, $regpagina";
                                    }else{
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM producto LIMIT $inicio, $regpagina";
                                    }
                                }else{
                                    $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM producto LIMIT $inicio, $regpagina";
                                }
                            


                                $selticket=mysqli_query($mysqli,$consulta);

                                $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                                if(mysqli_num_rows($selticket)>0):
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Ubicacion</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ct=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)): 
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $ct; ?></td>
                                        <td class="text-center"><?php echo $row['id']; ?></td>
                                        <td class="text-center"><?php echo $row['descripcion']; ?></td>
                                        <td class="text-center"><?php echo $row['tipo']; ?></td>
                                        <td class="text-center"><?php echo $row['stock']; ?></td>
                                        <td class="text-center"><?php echo $row['ubicacion']; ?></td>
                                        <td class="text-center">
                                            <a href="admin.php?view=stockedit&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                            <form action="" method="POST" style="display: inline-block;">
                                                <input type="hidden" name="id_del" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        $ct++;
                                        endwhile; 
                                    ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <h2 class="text-center">No hay productos registrados en el sistema</h2>
                                <br>
                            <?php endif; ?>
                        </div>
                        <?php 
                            if($numeropaginas>=1):
                            if(isset($_GET['producto'])){
                                $ticketselected=$_GET['producto'];
                            }else{
                                $ticketselected="all";
                            }
                        ?>
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                <?php if($pagina == 1): ?>
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="./admin.php?view=stockadmin&producto=<?php echo $ticketselected; ?>&pagina=<?php echo $pagina-1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                
                                
                                <?php
                                    for($i=1; $i <= $numeropaginas; $i++ ){
                                        if($pagina == $i){
                                            echo '<li class="active"><a href="./admin.php?view=stockadmin&producto='.$ticketselected.'&pagina='.$i.'">'.$i.'</a></li>';
                                        }else{
                                            echo '<li><a href="./admin.php?view=ticketadmin&ticket='.$ticketselected.'&pagina='.$i.'">'.$i.'</a></li>';
                                        }
                                    }
                                ?>
                                
                                
                                <?php if($pagina == $numeropaginas): ?>
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="./admin.php?view=stockadmin&producto=<?php echo $ticketselected; ?>&pagina=<?php echo $pagina+1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
<?php
}else{
?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="./img/Stop.png" alt="Image" class="img-responsive animated slideInDown"/><br>
                </div>
                <div class="col-sm-7 animated flip">
                    <h1 class="text-danger">No tiene los permisos necesarios</h1>
                    <h3 class="text-info text-center">Inicie sesión como administrador para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>