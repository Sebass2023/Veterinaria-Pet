

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <p><a href="UsuariosController.php?accion=home">Home</a> -> <a href="CitasController.php?accion=citas">Control Mascota</a></p>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Control de Mascotas</h1>
                    </div>

                    <?php 
                        $mascotas = $this->model->ConsultarMascota();
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
                                </div>
                            </div>
                            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar Mascota</button></center>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                            

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-gradient-primary">
                                    <h5 class="modal-title text-gray-100" id="exampleModalLabel"><b>Registro Mascota</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span class="text-gray-100" aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                    <form class="user" method="POST" action="MascotasController.php" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" name="accion" value="insertar">
                                                <label class="text-primary">Nombre:</label>
                                                <input type="text" name="Nombre" class="form-control" placeholder="Nombre Mascota" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-primary">Raza:</label>
                                                <input type="text" name="Raza" class="form-control" placeholder="Raza Mascota" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-primary">Edad:</label>
                                                <input type="number" name="Edad" class="form-control" placeholder="Edad Mascota" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-primary">Animal:</label>
                                                <select class="form-control" name="Rh" required>
                                                    <option value="Perro">Perro</option>
                                                    <option value="Gato">Gato</option>
                                                </select>
                                            </div>

                                            <!-- <div class="form-group">
                                                <select required name="Edad" class="form-control">
                                                    <?php foreach ($mascotas as $mascota) {
                                                        echo "<option value='". $mascota->idMascota."'>". $mascota->Nom_mascota."</option>";
                                                        }  ?>
                                                </select>
                                            </div> -->
                                       
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-primary">
                                        </div>
                                    </form>

                                </div>
                              </div>
                            </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
