<!-- Begin Page Content -->
                <div class="container-fluid">

                    <p><a href="UsuariosController.php?accion=home">Home</a> -> <a href="ProductosController.php?accion=catalogo">Pedido</a></p>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pedido</h1>
                    </div>

                    <?php 
                        $productos = $this->model->ConsultarProductos();
                     ?>


                    <?php 
                    $count = 1;
                    $carrito_total = 0;
                    foreach ($_SESSION['carrito'] as $productos) {
                            echo "<div class='card shadow mb-4'>";
                            echo "<div class='card-body'><div class='d-flex align-items-center'>";
                            echo "<div class'mr-3'><img width='100px' src='../assets/img/catalogo/".$_SESSION['carrito'][$count]['Imagen']."'></div>";
                            echo "<div style='margin-left: 20px;'><h4>".$_SESSION['carrito'][$count]['Producto']." (<i>".$_SESSION['carrito'][$count]['Valor']." cada uno</i>)</h4>";
                            $valor_total = $_SESSION['carrito'][$count]['Valor'] * $_SESSION['carrito'][$count]['Cantidad'];
                            echo "<h5>$ ".$valor_total."</h5>";
                            echo "<i>Cantidad: ".$_SESSION['carrito'][$count]['Cantidad']."</i></div>";
                            echo "</div></div>";
                            echo "</div>";
                            $carrito_total = $carrito_total + $valor_total; 
                            $count = $count + 1;
                    } 
                    ?>

                    <form method="POST" action="PedidosController.php">
                        <input type="hidden" name="accion" value="insertar">
                        <textarea class="form-control" style="display: none;"  name="detalles">
                            <?php
                            $count = 1;
                            foreach ($_SESSION['carrito'] as $productos){
                                echo $_SESSION['carrito'][$count]['Producto']. "| Precio: ". $_SESSION['carrito'][$count]['Valor'];
                                echo "<br>";
                                $count = $count + 1;
                            }
                            ?>
                        </textarea>
                            <input type="hidden" name="valor_total" value="<?php echo $carrito_total; ?>">
                            <p style='text-align:right;'><h5>Total productos: <?php echo $carrito_total; ?></h5></p>
                            <p><input type="button" class="btn btn-primary" value="Hacer pedido" data-toggle='modal' data-target='#ConfirmarPedido' style="float: right;"></p>

                                                            <div class="modal fade" id="ConfirmarPedido" tabindex="-1" role="dialog" aria-labelledby="ConfirmarPedidoLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title text-primary" id="ConfirmarPedidoLabel"><b>Confirmar pedido</b></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>

                                                                        <div class="modal-body">
                                                                            <p>Si esta seguro de hacer el pedido, por favor indiquenos su dirección:</p>
                                                                            <br>
                                                                            <input type="text" class="form-control" name="direccion" placeholder="Dirección">
                                                                            <br>
    
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                            <input type="submit" class="btn btn-primary" value="Hacer pedido">
                                                                        </div>
                                                                   

                                                                </div>
                                                              </div>
                                                            </div>
                    </form>


            
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
