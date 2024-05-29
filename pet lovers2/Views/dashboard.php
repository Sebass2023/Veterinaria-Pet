

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Administrador, <?php echo($_SESSION['Nom_usuario']); ?></h1>
                    </div>

                    <?php 
                        $usuarios = $this->model->ConsultarUsuarios();
                        $citas = $this->model->ConsultarCitas();
                        $citasUsuario = $this->model->ConsultarCitasUsuario();
                        $mascotas = $this->model->ConsultarMascota();
                        $productos = $this->model->ConsultarProductos();
                        $pedidos = $this->model->ConsultarPedidosAdmin();
                     ?>

                    

                    <!-- Content Row -->

                    <div class="row">

                        

                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Tabla citas -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-success">
                                    <h6 class="m-0 font-weight-bold text-gray-100"><i class="fa fa-list" aria-hidden="true"></i> Últimos Servicios</h6>
                                </div>
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Mascota</th>
                                                    <th>Fecha</th>
                                                    <th>Servicio</th>
                                                    <th>Comentarios</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($citas as $cita) {
                                                        echo"<tr>";
                                                        echo"<td>". $cita->Mascota_cita."</td>";
                                                        echo"<td>". $cita->Fecha_cita. "</td>";
                                                        echo"<td>". $cita->Tipo_cita."</td>";
                                                        echo"<td>". $cita->Desc_cita."</td>";
                                                        if ($cita->Estado_cita == "1"){
                                                            echo"<td><label class='text-warning'><i class='fa fa-clock-o' aria-hidden='true'></i> Pendiente</label></td>";
                                                        }elseif ($cita->Estado_cita == "2") {
                                                            echo"<td><label class='text-success'><i class='fa fa-check-circle-o' aria-hidden='true'></i> Servicio Confirmado</label></td>";
                                                        }elseif($cita->Estado_cita == "3"){
                                                            echo"<td><label class='text-primary'><i class='fa fa-check-circle' aria-hidden='true'></i> Servicio Finalizado</label></td>";
                                                        }elseif($cita->Estado_cita == "4"){
                                                            echo"<td><label class='text-danger'><i class='fa fa-times' aria-hidden='true'></i> Servicio Cancelado</label></td>";
                                                        }
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    <a href="CitasController.php?accion=citas" class="btn btn-secondary">Control de servicios</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-success">
                                    <h6 class="m-0 font-weight-bold text-gray-100"><i class="fa fa-user" aria-hidden="true"></i> Usuarios</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Teléfono</th>
                                                    <th>Rol</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($usuarios as $user) {
                                                        echo"<tr>";
                                                        echo"<td>". $user->Nom_usuario . " " . $user->Ape_usuario. "</td>";
                                                        echo"<td>". $user->Email_usuario."</td>";
                                                        echo"<td>". $user->Tel_usuario."</td>";
                                                        echo"<td>". $user->Rol_idRol."</td>";
                                                        echo"</tr>";
                                                    }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a href="UsuariosController.php?accion=usuarios" class="btn btn-secondary btn-icon-split">
                                        <span class="text">Control Usuarios</span>
                                    </a>

                                </div>
                            </div>

                        </div>

                          <!-- tabla Catalogo -->

                        <div class="col-lg-6 mb-4">

                            <!-- Tabla mascotas -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-success">
                                    <h6 class="m-0 font-weight-bold text-gray-100"><i class="fa fa-paw" aria-hidden="true"></i> Productos</h6>
                                </div>
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Valor</th>
                                                    <th>Cantidad</th>
                                                    <th>Imagen</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($productos as $producto) {
                                                        echo"<tr>";
                                                        echo"<td>". $producto->Nom_producto."</td>";
                                                        echo"<td>". $producto->Desc_producto. "</td>";
                                                        echo"<td>". $producto->Valor_producto."</td>";
                                                        echo"<td>". $producto->Cant_producto."</td>";
                                                        echo"<td>". $producto->Img_producto."</td>";
                                                        echo"<td>". $producto->Estado_producto."</td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    <a href="ProductosController.php?accion=Productos" class="btn btn-secondary">Control productos</a>
                                </div>
                            </div>
                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Tabla Pedidos -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-success">
                                    <h6 class="m-0 font-weight-bold text-gray-100"><i class="fa fa-archive" aria-hidden="true"></i> Historial Pedidos</h6>
                                </div>
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Descripcion</th>
                                                    <th>Total</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($pedidos as $pedido) {
                                                        echo"<tr>";
                                                        echo"<td>". $pedido->detalles."</td>";
                                                        echo"<td>". $pedido->valor_total. "</td>";
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
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    <a href="PedidosController.php?accion=pedidos" class="btn btn-secondary">Control Pedidos</a>
                                </div>
                            </div>
                            

                        </div>
                    </div>

                        

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
