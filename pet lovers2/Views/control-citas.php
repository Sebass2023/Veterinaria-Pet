

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <p><a href="UsuariosController.php?accion=home">Home</a> -> <a href="CitasController.php?accion=citas">Control servicios</a></p>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Control de servicios</h1>
                    </div>

                    <?php
                    if($_SESSION['Rol_idRol'] == "2"){ 
                        $citas = $this->model->ConsultarCitas();
                    }else{
                        $citas = $this->model->ConsultarCitasUsuario();
                    }
                        $mascotas = $this->model->SelectMascota();
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
                                                    <th>Mascota</th>
                                                    <th>Fecha</th>
                                                    <th>Tipo de servicio</th>
                                                    <th>Comentarios</th>
                                                    <th>Estado</th>
                                                    <?php if($_SESSION['Rol_idRol'] == "2"){
                                                            echo"<th>Confirmar cita</th>";
                                                          } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($citas as $cita) {
                                                        echo"<tr>";
                                                        echo"<td>". $cita->Mascota_cita."</td>";
                                                        echo"<td>". $cita->Fecha_cita. "</td>";
                                                        echo"<td>". $cita->Tipo_cita."</td>";
                                                        echo"<td><i>". $cita->Desc_cita."</i></td>";
                                                        if ($cita->Estado_cita == "1"){
                                                            echo"<td><label class='text-warning'><i class='fa fa-clock-o' aria-hidden='true'></i> Pendiente</label></td>";
                                                        }elseif ($cita->Estado_cita == "2") {
                                                            echo"<td><label class='text-success'><i class='fa fa-check-circle-o' aria-hidden='true'></i> Servicio Confirmado</label></td>";
                                                        }elseif($cita->Estado_cita == "3"){
                                                            echo"<td><label class='text-primary'><i class='fa fa-check-circle' aria-hidden='true'></i> Servicio Finalizado</label></td>";
                                                        }elseif($cita->Estado_cita == "4"){
                                                            echo"<td><label class='text-danger'><i class='fa fa-times' aria-hidden='true'></i> Servicio Cancelado</label></td>";
                                                        }
                                                        if($_SESSION['Rol_idRol'] == "2"){
                                                            echo"<td><center><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal". $cita->idCita ."'>Cambiar estado</button></center></td>";
                                                        }
                                                        echo"</tr>"; 
                                                        // aquí cierro la llave php para poder agregar luego el modal 
                                                        ?>

                                                        <!-- Modal de confirmar citas -->                                                       

                                                             <div class="modal fade" id="exampleModal<?php echo $cita->idCita; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header bg-gradient-primary">
                                                                    <h5 class="modal-title text-gray-100" id="exampleModalLabel"><b>Cambiar estado</b></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span class="text-gray-100" aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>

                                                                    <form class="user" method="POST" action="CitasController.php" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <input type="hidden" name="accion" value="editar">
                                                                                <input type="hidden" name="id" value="<?php echo $cita->idCita; ?>">
                                                                                <label class="text-info">Estado servicio</label>
                                                                                <select class="form-control" name="Estado">
                                                                                    <option class="text-success" value="2">Confirmar</option>
                                                                                    <option class="text-primary" value="3">Servicio completado</option>
                                                                                    <option class="text-danger" value="4">Cancelado</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="text-info">Comentarios</label>
                                                                                <textarea class="form-control" name="Descripcion" placeholder="Detalles del servicio" id="exampleFormControlTextarea1" rows="3" required></textarea>
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

                                                <?php // aquí abro de nuevo la llave de php para cerrar el ciclo con {
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Solicitar servicio</button></center>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                            

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-gradient-primary">
                                    <h5 class="modal-title text-primary text-gray-100" id="exampleModalLabel"><b>Registro Servicio</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span class="text-gray-100" aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                    <form class="user" method="POST" action="CitasController.php" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" name="accion" value="insertar">
                                                <label class="text-info">Fecha Servicio</label>
                                                <input type="date" name="Fecha" class="form-control" placeholder="Fecha Servicio" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-info">Servicio</label>
                                                <select class="form-control" name="Tipo" required>
                                                    <option value="Baño Antipulgas - $30.000">Baño Antipulgas - $30.000</option>
                                                    <option value="Baño Medicado - $40.000">Baño Medicado - $40.000</option>
                                                    <option value="Peluquería - $30.000">Peluquería - $30.000</option>
                                                    <option value="Limpieza dental - $10.000">Limpieza dental - $10.000</option>
                                                    <option value="Desparasitación - $20.000">Desparasitación - $20.000</option>
                                                    <option value="Corte uñas - $20.000">Corte uñas - $20.000</option>
                                                    <option value="Combo Belleza: Baño Antipulgas/Peluquería/Corte uñas - $65.000">Combo Belleza: Baño Antipulgas/Peluquería/Corte uñas - $65.000</option>
                                                    <option value="Combo Salud: Baño Medicado/Limpieza dental/Desparasitación - $60.000">Combo Salud: Baño Medicado/Limpieza dental/Desparasitación - $60.000</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-info">Mascota cita</label>
                                                <select required name="Mascota" class="form-control">
                                                    <?php foreach ($mascotas as $mascota) {
                                                        echo "<option value='". $mascota->idMascota."'>". $mascota->Nom_mascota."</option>";
                                                        }  ?>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
