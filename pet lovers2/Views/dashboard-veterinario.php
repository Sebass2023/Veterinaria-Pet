

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hola veterinario</h1>
                    </div>

                    <?php 
                        $usuarios = $this->model->ConsultarUsuarios();
                        $citas = $this->model->ConsultarCitas();
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
                                    <h6 class="m-0 font-weight-bold text-gray-100">Citas Medicas</h6>
                                </div>
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Mascota</th>
                                                    <th>Fecha</th>
                                                    <th>Tipo de cita</th>
                                                    <th>Veterinario</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($citas as $cita) {
                                                        echo"<tr>";
                                                        echo"<td>". $cita->Mascota_cita."</td>";
                                                        echo"<td>". $cita->Fecha_cita. "</td>";
                                                        echo"<td>". $cita->Tipo_cita."</td>";
                                                        echo"<td>". $cita->Veterinario_idUsuario."</td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    <a href="CitasController.php?accion=citas" class="btn btn-secondary">Control de citas</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-success">
                                    <h6 class="m-0 font-weight-bold text-gray-100">Control de usuarios</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
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
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Crear Usuario</span>
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
