

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hola, <?php echo($_SESSION['Nom_usuario'])."!"; ?></h1>
                    </div>

                    <?php 
                        $usuarios = $this->model->ConsultarUsuarios();
                        $citas = $this->model->ConsultarCitas();
                        $citasUsuario = $this->model->ConsultarCitasUsuario();
                        $mascotas = $this->model->ConsultarMascota();
                        $productos = $this->model->ConsultarProductos();
                        $pedidos = $this->model->ConsultarPedidos();
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
                                    <h6 class="m-0 font-weight-bold text-gray-100"><i class="fa fa-list" aria-hidden="true"></i> Servicios Solicitados</h6>
                                </div>
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Mascota</th>
                                                    <th>Fecha</th>
                                                    <th>Servicio</th>
                                                    <th>Descripción</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($citasUsuario as $cita) {
                                                        echo"<tr>";
                                                        echo"<td>". $cita->Mascota_cita."</td>";
                                                        echo"<td>". $cita->Fecha_cita. "</td>";
                                                        echo"<td>". $cita->Tipo_cita."</td>";
                                                        echo"<td>". $cita->Desc_cita."</td>";
                                                        if ($cita->Estado_cita == "1"){
                                                            echo"<td><label class='text-warning'>Pendiente</label></td>";
                                                        }elseif ($cita->Estado_cita == "2") {
                                                            echo"<td><label class='text-success'>Cita Confirmada</label></td>";
                                                        }elseif($cita->Estado_cita == "3"){
                                                            echo"<td><label class='text-primary'>Cita Finalizada</label></td>";
                                                        }elseif($cita->Estado_cita == "4"){
                                                            echo"<td><label class='text-danger'>Cita Cancelada</label></td>";
                                                        }
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    <a href="CitasController.php?accion=citas" class="btn btn-secondary">Control servicios</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Tabla mascotas -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-success">
                                    <h6 class="m-0 font-weight-bold text-gray-100"><i class="fa fa-paw" aria-hidden="true"></i> Mis Mascotas</h6>
                                </div>
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Raza</th>
                                                    <th>Edad</th>
                                                    <th>Animal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($mascotas as $mascota) {
                                                        echo"<tr>";
                                                        echo"<td>". $mascota->Nom_mascota."</td>";
                                                        echo"<td>". $mascota->Raza_mascota. "</td>";
                                                        echo"<td>". $mascota->Edad_mascota."</td>";
                                                        echo"<td>". $mascota->Rh_mascota."</td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    <a href="MascotasController.php?accion=Mascotas" class="btn btn-secondary">Control Mascotas</a>
                                </div>
                            </div>
                            

                        </div>


                        <div class="col-lg-6 mb-4">

                            <!-- Tabla Pedidos -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-success">
                                    <h6 class="m-0 font-weight-bold text-gray-100"><i class="fa fa-archive" aria-hidden="true"></i> Mis Pedidos</h6>
                                </div>
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Descripción</th>
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
                        
                        

                <!-- /.container-fluid -->

            </div>

        </div>


    </div>
            <!-- End of Main Content -->
