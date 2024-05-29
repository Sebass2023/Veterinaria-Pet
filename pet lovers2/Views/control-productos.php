 

 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <p><a href="UsuariosController.php?accion=home">Home</a> -> <a href="ProductosController.php?accion=citas">Control Productos</a></p>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Control de Productos</h1>
                    </div>

                    <?php 
                        $productos = $this->model->ConsultarProductos();
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
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Precio</th>
                                                    <th>Imagen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($productos as $producto) {
                                                        echo"<tr>";
                                                        echo"<td>". $producto->idProducto."</td>";
                                                        echo"<td>". $producto->Nom_producto."</td>";
                                                        echo"<td>". $producto->Desc_producto. "</td>";
                                                        echo"<td>". $producto->Valor_producto."</td>";
                                                        echo"<td><img width='100px' src='../assets/img/catalogo/". $producto->Img_producto."'></td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar Producto</button></center>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                            

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-gradient-primary">
                                    <h5 class="modal-title text-primary text-gray-100" id="exampleModalLabel">Registro producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span class="text-gray-100" aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                    <form class="user" method="POST" action="ProductosController.php" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" name="accion" value="insertar">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombre Producto" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion Producto" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="precio" class="form-control" placeholder="Precio Producto" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="estado" class="form-control" placeholder="Estado Producto" value="1" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="cantidad" class="form-control" placeholder="Cantidad Producto" value="88" required>
                                            </div>
                                            <div class="input-group mb-3">
                                              <div class="custom-file">
                                                <input type="file" name="imagen" class="custom-file-input" id="inputGroupFile02" required>
                                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Imagen producto</label>
                                              </div>
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
