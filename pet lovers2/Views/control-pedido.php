                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <p><a href="UsuariosController.php?accion=home">Home</a> -> <a href="PedidosController.php?accion=pedidos">Control Pedidos</a></p>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Control de Pedidos</h1>
                    </div>

                    <?php 
                        if($_SESSION['Rol_idRol'] == "2"){ 
                            $pedidos = $this->model->ConsultarPedidosAdmin();
                        }else{
                            $pedidos = $this->model->ConsultarPedidos();
                        }
                    ?>


                    <!-- Content Row -->
                    <div class="row">

                        

                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-body border-left-primary">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Descripción</th>
                                                    <?php if($_SESSION['Rol_idRol'] == "2"){
                                                            echo"<th>Cliente</th>";
                                                          } 
                                                    ?>
                                                    <th>Total</th>
                                                    <th>Dirección</th>
                                                    <th>Estado</th>
                                                    <?php if($_SESSION['Rol_idRol'] == "2"){
                                                            echo"<th>Cambiar estado</th>";
                                                          } 
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($pedidos as $pedido) {
                                                        echo"<tr>";
                                                        echo"<td>". $pedido->detalles."</td>";
                                                        if($_SESSION['Rol_idRol'] == "2"){
                                                             echo"<td>". $pedido->Id_usuario."</td>";
                                                          } 
                                                        echo"<td>". $pedido->valor_total. "</td>";
                                                        echo"<td>". $pedido->direccion. "</td>";
                                                        if ($pedido->estado == "1"){
                                                            echo"<td><label class='text-warning'><i class='fa fa-clock-o' aria-hidden='true'></i> Pendiente</label></td>";
                                                        }elseif ($pedido->estado == "2") {
                                                            echo"<td><label class='text-success'><i class='fa fa-check-circle-o' aria-hidden='true'></i> Pedido Confirmado</label></td>";
                                                        }elseif ($pedido->estado == "3") {
                                                            echo"<td><label class='text-info'><i class='fa fa-bus' aria-hidden='true'></i> Pedido Enviado</label></td>";
                                                        }elseif($pedido->estado == "4"){
                                                            echo"<td><label class='text-primary'><i class='fa fa-archive' aria-hidden='true'></i> Pedido recibido</label></td>";
                                                        }elseif($pedido->estado == "5"){
                                                            echo"<td><label class='text-danger'><i class='fa fa-times' aria-hidden='true'></i> Pedido Cancelado</label></td>";
                                                        }
                                                        if($_SESSION['Rol_idRol'] == "2"){
                                                            echo"<td><center><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal".
                                                            $pedido->Id_pedidos ."'>Cambiar estado</button></center></td>";
                                                        }
                                                        echo"</tr>";
                                                ?>
                                                        <div class="modal fade" id="exampleModal<?php echo $pedido->Id_pedidos; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header bg-gradient-primary">
                                                                    <h5 class="modal-title text-primary text-gray-100" id="exampleModalLabel"><b>Cambiar estado</b></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span class="text-gray-100" aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>

                                                                    <form class="user" method="POST" action="PedidosController.php" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <input type="hidden" name="accion" value="editar">
                                                                                <input type="hidden" name="id" value="<?php echo $pedido->Id_pedidos; ?>">
                                                                                <label class="text-info">Estado Pedido</label>
                                                                                <select class="form-control" name="Estado">
                                                                                    <option class="text-success" value="2">Confirmar Pedido</option>
                                                                                    <option class="text-info" value="3">Enviar Pedido</option>
                                                                                    <option class="text-primary" value="4">Pedido Recibido</option>
                                                                                    <option class="text-danger" value="5">Cancelar Pedido</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                            <input type="submit" class="btn btn-primary">
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                              </div>
                                                            </div>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->