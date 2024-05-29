

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <p><a href="UsuariosController.php?accion=home">Home</a> -> <a href="UsuariosController.php?accion=usuarios">Control usuario</a></p>
                    <br>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Control de usuarios</h1>
                    </div>

                    <?php 
                        $usuarios = $this->model->ConsultarUsuarios();
                     ?>


                    <!-- Content Row -->
                    <div class="row">

                        

                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4 border-left-success">
                                <div class="card-body">
                            
                        
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Rol</th>
                                                    <th>Editar/Borrar</th>
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
                                                        echo"<td>";
                                                        if ($user->Rol_idRol == "administrador" && $user->idUsuario != "20") {
                                                        ?>
                                                            <form method="POST" action="UsuariosController.php" enctype="multipart/form-data">
                                                                <input type="hidden" name="accion" value="eliminar">
                                                                <input type="hidden" name="id" value="<?php echo $user->idUsuario ?>">
                                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                                            </form>
                                                        <?php 
                                                        }else{
                                                            echo"<i>No se pueden borrar clientes</i>";
                                                        }
                                                        echo"</td>";
                                                        echo"</tr>";
                                                    }?>
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
